<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'reservationNumber' => $this->reservation_number,
            'userId' => $this->user_id,
            'roomId' => $this->room_id,
            'checkinDate' => Carbon::parse($this->checkin_date)->format('M d, Y'),
            'checkoutDate' => Carbon::parse($this->checkout_date)->format('M d, Y'),
            'adultCount' => $this->adult_count,
            'childCount' => $this->child_count,
            'guest' => UserResource::make($this->whenLoaded('user')),
            'room' => RoomResource::make($this->whenLoaded('room')),
        ];
    }
}
