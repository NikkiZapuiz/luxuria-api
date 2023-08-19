<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ReservationResource::collection(Reservation::all());
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
        return ReservationResource::make($reservation);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
