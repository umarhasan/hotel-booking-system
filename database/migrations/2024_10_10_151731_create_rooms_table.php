<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained(); // Hotel foreign key
            $table->string('name'); // Room name
            $table->string('type'); // e.g., single, double, suite
            $table->decimal('price', 8, 2); // Room price
            $table->boolean('is_available')->default(true); // Room availability
            $table->text('benefits')->nullable(); // Room benefits stored as JSON or text
            $table->integer('adults'); // Number of adults
            $table->integer('children')->nullable(); // Number of children
            $table->json('facilities')->nullable(); // Additional facilities stored as JSON
            $table->string('image')->nullable(); // Store room images
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
