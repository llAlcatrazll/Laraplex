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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User performing the action
            $table->unsignedBigInteger('bookable_id')->nullable(); // Polymorphic relation
            $table->string('bookable_type')->nullable(); // Polymorphic relation type
            $table->string('action_type'); // e.g., created, updated, declined
            $table->text('remarks')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('actions');
    }
};
