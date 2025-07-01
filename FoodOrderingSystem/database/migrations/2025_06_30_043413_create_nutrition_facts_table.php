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
        // 1. Buat tabel nutrition_facts
        Schema::create('nutrition_facts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id')->unique();
            $table->integer('calories')->nullable();
            $table->decimal('protein', 5, 2)->nullable();
            $table->decimal('fat', 5, 2)->nullable();
            $table->decimal('carbohydrates', 5, 2)->nullable();
            $table->decimal('fiber', 5, 2)->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition_facts');
    }
};