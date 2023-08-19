<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'full_name' => 'Admin',
            'email' => 'admin001@gmail.com',
            'password' => 'SeaOil001',
            'role' => 'admin',
        ]);

        for($i = 1001; $i <= 1030; $i++) {
            $roomType = 'standard';
            if ($i >=1001 && $i <= 1010) {
                $roomType = 'Suite';
            } else if ($i >= 1011 && $i <= 1020) {
                $roomType = 'Deluxe';
            }
            Room::factory()->hasReservations(2)->create([
                'room_number' => $i,
                'room_type' => $roomType,
            ]); 
        }
        
        

        // Reservation::factory()->create([
        //     'checkin_date' => '2023-08-22',
        //     'checkout_date' => '2023-08-28',
        //     'adult_count' => '2',
        //     'child_count' => '0',
        // ]);


        // Reservation::factory(10)->create();

        User::factory(10)->create();
        


    }
}
