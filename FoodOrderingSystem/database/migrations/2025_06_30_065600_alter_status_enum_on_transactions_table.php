<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('status',
                ['pending','processing','ready','completed','cancelled']
            )->default('pending')->change();
        });
    }

    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('status',
                ['pending','processing','completed','cancelled']
            )->default('pending')->change();
        });
    }
};

