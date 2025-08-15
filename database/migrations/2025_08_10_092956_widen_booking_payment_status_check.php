<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Drop old constraint
        DB::statement("ALTER TABLE bookings DROP CONSTRAINT IF EXISTS bookings_payment_status_check");

        // Add new allowed values (include what you need)
        DB::statement("
            ALTER TABLE bookings
            ADD CONSTRAINT bookings_payment_status_check
            CHECK (payment_status IN (
                'pending',
                'succeeded',
                'failed',
                'canceled',
                'requires_payment_method',
                'requires_action',
                'processing'
            ))
        ");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE bookings DROP CONSTRAINT IF EXISTS bookings_payment_status_check");
        DB::statement("
            ALTER TABLE bookings
            ADD CONSTRAINT bookings_payment_status_check
            CHECK (payment_status IN ('pending','succeeded','failed','canceled'))
        ");
    }
};
