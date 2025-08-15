<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bookings', function (Blueprint $t) {
            $t->id();
            $t->foreignId('package_id')->constrained()->cascadeOnDelete();
            $t->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            // Who is paying
            $t->string('customer_name');
            $t->string('customer_email');
            $t->string('customer_phone')->nullable();

            // Trip choices (simple example – expand as you like)
            $t->date('departure_date')->nullable();
            $t->enum('pricing_mode', ['land_only', 'land_air'])->default('land_only'); // Land-only vs Land+Air
            $t->string('gateway')->nullable(); // e.g. LAX/JFK/etc
            $t->unsignedInteger('travelers')->default(1);
            $t->unsignedTinyInteger('rooms')->default(1);

            // Money (store in cents to be PG-safe)
            $t->string('currency', 10)->default('usd');
            $t->unsignedBigInteger('total_amount_cents')->default(0);

            // Stripe
            $t->string('payment_intent_id')->nullable();
            $t->enum('payment_status', ['pending', 'succeeded', 'failed', 'canceled'])->default('pending');
            $t->timestamp('paid_at')->nullable();

            $t->json('extras')->nullable(); // anything else you want to keep
            $t->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('bookings');
    }
};
