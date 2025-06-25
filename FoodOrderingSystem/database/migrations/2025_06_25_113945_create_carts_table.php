<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // If user login required
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade'); // connect to foods table
            $table->enum('size', ['S', 'M', 'L'])->default('M');
            $table->string('note')->nullable();
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
