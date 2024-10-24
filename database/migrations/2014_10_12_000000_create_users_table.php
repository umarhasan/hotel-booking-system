<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('hotel_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('is_admin')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('created_by')->nullable();
            $table->string('phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
