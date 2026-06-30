<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->enum('category_type', ['news', 'product', 'both'])->default('news')->after('description');
            $table->string('icon')->nullable()->after('category_type'); // Font Awesome class e.g. "fa-car"
            $table->string('color')->nullable()->after('icon'); // hex color for UI
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn(['category_type', 'icon', 'color']);
        });
    }
};
