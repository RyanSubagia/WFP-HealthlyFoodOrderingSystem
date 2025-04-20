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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payments_id');
            $table->unsignedBigInteger('users_id');

            $table->float('total');
            $table->dateTime('tgl_Pemesanan');
            $table->string('no_meja');
            $table->enum('metode_Pemesanan', ['Dine-In', 'Take-Away']);
            $table->foreign('payments_id')->references('id')->on('payments');
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->foreign('users_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['status']);

            $table->dropForeign(['payments_id','users_id']);
        });
    }
};
