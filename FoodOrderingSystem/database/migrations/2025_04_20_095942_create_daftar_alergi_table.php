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
        Schema::create('daftar_alergi', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('idAlergi');

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idAlergi')->references('id')->on('alergi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('daftar_alergi', function (Blueprint $table) {
            $table->dropForeign(['idAlergi','users_id']);
        });
    }
};
