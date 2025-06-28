<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
         DB::unprepared('
            CREATE TRIGGER trg_after_insert_transactions
            AFTER INSERT ON transactions
            FOR EACH ROW
            BEGIN
                DECLARE tambahan_poin DOUBLE;
                SET tambahan_poin = FLOOR(NEW.total / 10000);
                
                UPDATE users
                SET poin = poin + tambahan_poin
                WHERE id = NEW.users_id;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_insert_transactions');
    }
};
