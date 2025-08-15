<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('agent_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete()
                ->after('user_id');

            $table->enum('admin_status', ['new','approved','rejected'])
                ->default('new')
                ->after('payment_status');

            $table->timestamp('approved_at')->nullable()->after('paid_at');
            $table->timestamp('rejected_at')->nullable()->after('approved_at');
            $table->text('admin_notes')->nullable()->after('extras');
        });
    }

    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('agent_id');
            $table->dropColumn(['admin_status','approved_at','rejected_at','admin_notes']);
        });
    }
};
