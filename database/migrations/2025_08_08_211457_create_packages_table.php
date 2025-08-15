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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')
                  ->constrained('destinations')
                  ->onDelete('cascade');
            $table->string('title', 255);
            $table->string('subtitle', 255)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('price_unit', 50)->default('per person');
            $table->string('duration', 100)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('country', 100)->nullable();
            $table->text('image_url')->nullable();
            $table->text('thumbnail_url')->nullable();
            $table->json('features')->nullable();
            $table->json('tags')->nullable();
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->integer('total_reviews')->default(0);
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->string('status', 50)->default('active');
            $table->integer('display_order')->default(0);
            $table->timestamps();
            
            // Add indexes for better performance
            $table->index('destination_id');
            $table->index('status');
            $table->index('is_bestseller');
            $table->index('is_featured');
            $table->index('display_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};