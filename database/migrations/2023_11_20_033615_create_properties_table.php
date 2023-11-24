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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('price', 11, 2);
            $table->decimal('min_price', 11, 2);
            $table->string('return_rate')->nullable();
            $table->string('return_for')->nullable();
            $table->string('capital_back')->nullable();
            $table->string('target_duration')->nullable();
            $table->decimal('invested', 11, 2)->nullable();

            //propery info
            $table->string('name');
            $table->string('type')->nullable();
            $table->integer('reviews')->nullable();
            $table->string('rooms')->nullable();
            $table->string('floor')->nullable();
            $table->string('building_year')->nullable();
            $table->string('square_meter')->nullable();
            $table->string('building_location')->nullable();
            $table->longText('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
