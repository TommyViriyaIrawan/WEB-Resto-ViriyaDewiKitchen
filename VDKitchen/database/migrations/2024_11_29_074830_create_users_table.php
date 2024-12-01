<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name')->nullable(); // Name is optional for guests
            $table->string('email')->unique()->nullable(); // Email is optional for guests
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable(); // Password is optional for guests
            $table->boolean('is_guest')->default(false); // Guest flag
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
