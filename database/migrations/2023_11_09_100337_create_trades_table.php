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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('user_id');
            $table->string('symbol');
            $table->string('trade_action')->nullable();
            $table->string('type');
            $table->double('amount');
            $table->string('sl')->nullable();
            $table->string('tp')->nullable();
            $table->string('leverage')->nullable();
            $table->integer('execution_time')->nullable();

            $table->integer('percent')->nullable();
            $table->integer('status')->nullable();
            $table->double('profit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
