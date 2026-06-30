<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Contents — status + published_at combo is the most frequent filter
        Schema::table('contents', function (Blueprint $table) {
            $table->index(['status', 'published_at'], 'contents_status_published_at_index');
            $table->index('is_featured', 'contents_is_featured_index');
            $table->index('slug', 'contents_slug_index');
        });

        // Products — marketplace queries filter heavily on status
        Schema::table('products', function (Blueprint $table) {
            $table->index('status', 'products_status_index');
            $table->index(['status', 'is_featured'], 'products_status_is_featured_index');
            $table->index('slug', 'products_slug_index');
        });

        // Categories — nav and filter queries
        Schema::table('categories', function (Blueprint $table) {
            $table->index('slug', 'categories_slug_index');
            $table->index(['status', 'is_main'], 'categories_status_is_main_index');
            $table->index('category_type', 'categories_category_type_index');
        });

        // Market prices — ticker and table queries
        Schema::table('market_prices', function (Blueprint $table) {
            $table->index('recorded_at', 'market_prices_recorded_at_index');
        });
    }

    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropIndex('contents_status_published_at_index');
            $table->dropIndex('contents_is_featured_index');
            $table->dropIndex('contents_slug_index');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('products_status_index');
            $table->dropIndex('products_status_is_featured_index');
            $table->dropIndex('products_slug_index');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropIndex('categories_slug_index');
            $table->dropIndex('categories_status_is_main_index');
            $table->dropIndex('categories_category_type_index');
        });

        Schema::table('market_prices', function (Blueprint $table) {
            $table->dropIndex('market_prices_recorded_at_index');
        });
    }
};
