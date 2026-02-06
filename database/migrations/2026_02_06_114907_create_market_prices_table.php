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

        Schema::create('market_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('commodity_type_id');

            $table->decimal('price_min', 15, 2);
            $table->decimal('price_max', 15, 2);

            $table->enum('market_type', ['trending', 'hot_offer', 'update'])
                ->default('update');

            $table->date('recorded_at');

            $table->timestamps();

            // FK
            $table->foreign('commodity_type_id')
                ->references('id')
                ->on('commodity_types')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('market_prices');
    }
};
