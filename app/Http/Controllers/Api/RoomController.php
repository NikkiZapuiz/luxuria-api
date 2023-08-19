<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomUpdateRequest;
use App\Http\Resources\RoomResource;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Room::query();

        if(isset($request->roomType)) {
            $query->where('room_type', $request->roomType);
        } 
        return RoomResource::collection($query->get());

        if(isset($request->isActive)) {
            $query->where('is_active', $request->isActive);
        }
        return RoomResource::collection($query->get());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return RoomResource::make(Room::create([
            'room_number' => $request->roomNumber,
            'room_type' => $request->roomType,
            'is_available' => $request->isAvailable,
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return RoomResource::make($room);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(RoomUpdateRequest $request, Room $room)
    {
        if (isset($request->roomNumber)) {
            $room->room_number = $request->roomNumber;
        }
        if (isset($request->roomType)) {
            $room->room_type = $request->roomType;
        }
        if (isset($request->isAvailable)) {
            $room->is_available = $request->isAvailable;
        }

        $room->save();

        return RoomResource::make($room);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted'
        ]);
    }
}
