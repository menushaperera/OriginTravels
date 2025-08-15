<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // E.164 fits in 16 chars (+ + up to 15 digits); 20 gives extra room
            $table->string('phone', 20)->nullable();
            $table->unique('phone'); // creates index "users_phone_unique"
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // first drop the unique index, then the column
            $table->dropUnique('users_phone_unique');
            $table->dropColumn('phone');
        });
    }
};
