<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // JSONB on Postgres (Laravel maps json() to jsonb)
            $table->json('inclusions')->nullable()->after('image_url');
            $table->json('exclusions')->nullable()->after('inclusions');
            // If you’ll store a structured itinerary, keep json; if it’s big HTML, use longText instead.
            $table->json('itinerary')->nullable()->after('exclusions');
            $table->json('gallery_urls')->nullable()->after('itinerary');
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn(['inclusions','exclusions','itinerary','gallery_urls']);
        });
    }
};