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
            $table->unsignedBigInteger('transaksi_id');
            $table->unsignedBigInteger('foods_id');

            $table->id();
            $table->foreign('transaksi_id')->references('id')->on('transaksi');
            $table->foreign('foods_id')->references('id')->on('foods');
            $table->integer('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_pesanan', function (Blueprint $table) {
            $table->dropColumn(['id']);

            $table->dropForeign(['transaksi_id','foods_id']);
        });
    }
};
