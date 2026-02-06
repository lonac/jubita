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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            // Basic content info
            $table->string('title');
            $table->string('slug')->unique();        // URL-friendly
            $table->text('excerpt')->nullable();    // short summary
            $table->longText('content');             // full article

            // Relations
            $table->unsignedBigInteger('post_type_id');  // News, Feature, etc.
            $table->unsignedBigInteger('category_id');   // Masoko, Uchumi, etc.
            $table->unsignedBigInteger('author_id');     // FK to users table

            // Media & flags
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);

            // Status & publication
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();

            // Foreign keys
            $table->foreign('post_type_id')
                ->references('id')
                ->on('post_types')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('author_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
