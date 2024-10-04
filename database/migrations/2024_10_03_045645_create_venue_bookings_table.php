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
        Schema::create('venue_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booker');
            $table->string('eventname');
            $table->date('event_date');
            $table->time('starting_time');
            $table->time('ending_time');
            $table->string('event_facility');
            $table->string('college')->default(null);
            $table->string('club');
            $table->string('status')->default('pending');
            // pending | accepted | denied
            $table->boolean('deleted')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_bookings');
    }
};
