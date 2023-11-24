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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->string('pass')->nullable();
            $table->string('currency')->nullable();
            $table->string('gender')->nullable();
            $table->string('avatar')->nullable();

            $table->string('date_of_birth')->nullable();
            $table->string('id_type')->nullable();
            $table->string('id_front_img')->nullable();
            $table->string('id_back_img')->nullable();

            $table->double('balance')->nullable();
            $table->double('profit')->nullable();
            $table->integer('admin')->default(0);
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('referrer_id')->nullable();
            $table->foreign('referrer_id')->references('id')->on('users');
            $table->bigInteger('referred_by')->nullable();
            $table->string('username')->unique();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
