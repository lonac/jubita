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
        Schema::create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
        
            $table->decimal('price', 15, 2);
            $table->decimal('old_price', 15, 2)->nullable();
        
            $table->float('rating')->default(0); // 0–5
            $table->string('image')->nullable();
        
            $table->enum('status', ['active', 'inactive', 'sold'])->default('active');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('markets');
    }
};
