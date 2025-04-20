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
        Schema::create('daftar_pesanan', function (Blueprint $table) {
            $table->unsignedBigInteger('transactions_id');
            $table->unsignedBigInteger('foods_id');

            $table->foreign('transactions_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('foods_id')->references('id')->on('foods')->onDelete('cascade');
            $table->integer('qty');
            $table->timestamps();
            $table->primary(['transactions_id', 'foods_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_pesanan', function (Blueprint $table) {
            $table->dropColumn(['id']);

            $table->dropForeign(['transactions_id','foods_id']);
        });
    }
};
