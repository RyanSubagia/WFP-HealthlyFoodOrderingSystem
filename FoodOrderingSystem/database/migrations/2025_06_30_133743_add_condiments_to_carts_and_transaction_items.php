<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->boolean('shoyu')->nullable()->after('quantity');
            $table->boolean('wasabi')->nullable()->after('shoyu');
            $table->boolean('gari')->nullable()->after('wasabi');
            $table->boolean('togarashi')->nullable()->after('gari');
            $table->boolean('ponzu')->nullable()->after('togarashi');
            $table->boolean('mayones')->nullable()->after('ponzu');
            $table->boolean('teriyaki')->nullable()->after('mayones');
            $table->boolean('chili_Oil')->nullable()->after('teriyaki');
        });

        Schema::table('transaction_items', function (Blueprint $table) {
            $table->boolean('shoyu')->nullable()->after('price');
            $table->boolean('wasabi')->nullable()->after('shoyu');
            $table->boolean('gari')->nullable()->after('wasabi');
            $table->boolean('togarashi')->nullable()->after('gari');
            $table->boolean('ponzu')->nullable()->after('togarashi');
            $table->boolean('mayones')->nullable()->after('ponzu');
            $table->boolean('teriyaki')->nullable()->after('mayones');
            $table->boolean('chili_Oil')->nullable()->after('teriyaki');
        });
    }

    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn([
                'shoyu', 'wasabi', 'gari', 'togarashi', 'ponzu', 'mayones', 'teriyaki', 'chili_Oil'
            ]);
        });

        Schema::table('transaction_items', function (Blueprint $table) {
            $table->dropColumn([
                'shoyu', 'wasabi', 'gari', 'togarashi', 'ponzu', 'mayones', 'teriyaki', 'chili_Oil'
            ]);
        });
    }
};
