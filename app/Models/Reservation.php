<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function hotel_guests()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
}
