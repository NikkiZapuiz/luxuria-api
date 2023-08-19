<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_number')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('room_id')->constrained();
            $table->timestamp('checkin_date')->nullable();
            $table->timestamp('checkout_date')->nullable();
            $table->integer('adult_count')->nullable();
            $table->integer('child_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
