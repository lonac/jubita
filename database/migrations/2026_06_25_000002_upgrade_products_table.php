<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            $table->string('location')->nullable()->after('image');         // City/Region
            $table->string('phone')->nullable()->after('location');         // Seller phone
            $table->string('seller_name')->nullable()->after('phone');      // Seller name
            $table->enum('condition', ['new', 'used', 'fairly_used'])->default('used')->after('seller_name');
            $table->boolean('is_featured')->default(false)->after('condition');
            $table->unsignedBigInteger('views')->default(0)->after('is_featured');
            $table->json('meta')->nullable()->after('views');               // Vehicle: make,model,year,mileage,fuel,transmission,color,body_type
        });

        // Multiple images table
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('image_path');
            $table->boolean('is_primary')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn(['category_id', 'location', 'phone', 'seller_name', 'condition', 'is_featured', 'views', 'meta']);
        });
    }
};
