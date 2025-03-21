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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plane_id');
            $table->unsignedBigInteger('pilot_id');
            $table->foreign('plane_id')->references('id')->on('planes')->onDelete('cascade');
            $table->foreign('pilot_id')->references('id')->on('pilots')->onDelete('cascade');
            $table->integer('number');
            $table->string('dep_aiport');
            $table->string('arr_aiport');
            $table->time('dep_time');
            $table->time('arr_time');
            $table->enum('status',['planned','processing', 'fenced', 'canceled'])->default('planned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
