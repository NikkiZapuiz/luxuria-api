<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
            'reservationNumber' => 'required|max:5',
            'userId' => 'required|exists:users,id',
            'roomId' => 'required|exists:rooms,id',
            'checkinDate' => 'date_format:m/d/Y',
            'checkoutDate' => 'date_format:m/d/Y',
            'adultCount' => 'required',
            'childCount' => 'required',
        ];
    }
}
