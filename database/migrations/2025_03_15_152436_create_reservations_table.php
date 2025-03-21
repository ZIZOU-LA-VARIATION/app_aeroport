<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passenger_id');
            $table->unsignedBigInteger('flight_id');
            $table->foreign('passenger_id')->references('id')->on('passengers')->onDelete('cascade');
            $table->foreign('flight_id')->references('id')->on('flights')->onDelete('cascade');
            $table->enum('status', ['unpaid', 'paid'])->default('paid');
            $table->text('paiment_detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revervations');
    }
};
