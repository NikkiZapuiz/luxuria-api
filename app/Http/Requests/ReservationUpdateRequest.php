<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ReservationUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'reservationNumber' => 'sometimes|required|starts_with:lux-',
            'userId' => 'sometimes|required|exists:users,id',
            'roomId' => 'sometimes|required|exists:rooms,id',
            'checkinDate' => 'sometimes|date_format:m/d/Y',
            'checkoutDate' => 'sometimes|date_format:m/d/Y',
            'adultCount' => 'sometimes|required',
            'childCount' => 'sometimes|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucsess' =>false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
