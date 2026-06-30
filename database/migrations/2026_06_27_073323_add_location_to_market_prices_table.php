<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('market_prices', function (Blueprint $table) {
            $table->string('location')->nullable()->after('commodity_type_id');
            $table->string('unit')->nullable()->after('location'); // e.g. "kg", "lita", "debe"
        });
    }

    public function down(): void
    {
        Schema::table('market_prices', function (Blueprint $table) {
            $table->dropColumn(['location', 'unit']);
        });
    }
};
