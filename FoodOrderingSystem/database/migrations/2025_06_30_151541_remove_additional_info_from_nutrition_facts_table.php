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
        if (Schema::hasColumn('nutrition_facts', 'additional_info')) {
            Schema::table('nutrition_facts', function (Blueprint $table) {
                $table->dropColumn('additional_info');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('nutrition_facts', 'additional_info')) {       
            Schema::table('nutrition_facts', function (Blueprint $table) {
                $table->text('additional_info')->nullable(); // Tambahkan lagi jika di-rollback
            });
        }
    }
};
