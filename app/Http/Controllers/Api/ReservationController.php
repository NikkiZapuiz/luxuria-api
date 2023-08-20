<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Http\Requests\ReservationUpdateRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Reservation::query();

        if (isset($request->checkinDate)) {
            $query->where('checkin_date', $request->checkinDate);
        }
        return ReservationResource::collection($query->with('user')->get());
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        return ReservationResource::make(Reservation::create([
            'reservation_number' => $request->reservationNumber,
            'user_id' => $request->userId,
            'room_id' => $request->roomId,
            'checkin_date' => Carbon::parse(strtotime($request->checkinDate)),
            'checkout_date' => Carbon::parse(strtotime($request->checkoutDate)),
            'adult_count' => $request->adultCount,
            'child_count' => $request->childCount,

        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return ReservationResource::make($reservation->loadMissing('room')->loadMissing('user'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationUpdateRequest $request, Reservation $reservation)
    {
        if (isset($request->reservationNumber)) {
            $reservation->reservation_number = $request->reservationNumber;
        }
        if (isset($request->userId)) {
            $reservation->user_id = $request->userId;
        }
        if (isset($request->roomId)) {
            $reservation->room_id = $request->roomId;
        }
        if (isset($request->checkinDate)) {
            $reservation->checkin_date = $request->checkinDate;
        }
        if (isset($request->checkoutDate)) {
            $reservation->checkout_date = $request->checkoutDate;
        }
        if (isset($request->adultCount)) {
            $reservation->adult_count = $request->adultCount;
        }
        if (isset($request->childCount)) {
            $reservation->child_count = $request->childCount;
        }

        $reservation->save();

        return ReservationResource::make($reservation);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted'
        ]);
    }
}
