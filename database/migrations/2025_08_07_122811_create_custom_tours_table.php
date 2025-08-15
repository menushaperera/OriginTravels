<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('custom_tours', function (Blueprint $table) {
            $table->id();
            
            // Destination fields
            $table->string('region', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('city', 100)->nullable();
            
            // Flight fields
            $table->string('flights', 10)->nullable();
            $table->string('departure_city', 100)->nullable();
            
            // Travel dates
            $table->date('departure_date')->nullable();
            $table->date('return_date')->nullable();
            $table->boolean('flexible_dates')->default(false);
            
            // Passengers
            $table->string('adults', 20)->nullable();
            $table->string('children', 20)->nullable();
            $table->string('infants', 20)->nullable();
            
            // Accommodation
            $table->string('rooms', 20)->nullable();
            $table->string('hotel_category', 50)->nullable();
            
            // Budget
            $table->string('budget', 20)->nullable();
            
            // Contact information
            $table->string('full_name');
            $table->string('phone', 50);
            $table->string('email');
            $table->string('travel_agency')->nullable();
            $table->text('special_requests')->nullable();
            
            // Status
            $table->string('status', 50)->default('pending');
            
            $table->timestamps();
            
            // Indexes
            $table->index('email');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_tours');
    }
};