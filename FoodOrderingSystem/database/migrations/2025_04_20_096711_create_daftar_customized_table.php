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
        Schema::create('daftar_customized_product', function (Blueprint $table) {
            $table->unsignedBigInteger('daftar_Pesanan_transactions_id');
            $table->unsignedBigInteger('daftar_Pesanan_foods_id');
            $table->unsignedBigInteger('idcustomized');
            
            $table->foreign('daftar_Pesanan_transactions_id')->references('transactions_id')->on('daftar_Pesanan');
            $table->foreign('daftar_Pesanan_foods_id')->references('foods_id')->on('daftar_Pesanan');
            $table->foreign('idcustomized')->references('id')->on('customized');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_customized_product', function (Blueprint $table) {
            $table->dropForeign(['daftar_Pesanan_transactions_id','daftar_Pesanan_foods_id','idcustomized']);
        });
    }
};
