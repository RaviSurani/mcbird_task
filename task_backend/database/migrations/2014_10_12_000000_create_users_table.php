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

            $table->string('firstName');
            $table->string('lastName');
            $table->string('userPone')->unique()->nullable();
            $table->string('userEmail')->unique()->nullable();
            $table->date('dob')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('device_type')->nullable();
            $table->string('browser')->nullable();
            $table->string('user_agent')->nullable();
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
