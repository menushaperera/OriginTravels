<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('invoice_number')->nullable()->unique();
            $table->string('invoice_pdf_path')->nullable(); // storage/app/invoices/...
            $table->string('payment_method_brand')->nullable();
            $table->string('payment_method_last4')->nullable();
            $table->string('receipt_url')->nullable(); // Stripe charge receipt
        });
    }

    public function down(): void {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'invoice_number','invoice_pdf_path',
                'payment_method_brand','payment_method_last4','receipt_url'
            ]);
        });
    }
};
