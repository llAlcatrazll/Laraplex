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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->id('user_id');
            $table->id('status');
            $table->id('table');
            $table->timestamps();
        });
    }

    /*
          'request_id',
            'user_id',
            'status',
            'response',
            'responded_at',
            'remarks',
            'time', */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
