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
        Schema::table('reservations', function (Blueprint $table) {
            if (!Schema::hasColumn('reservations', 'status')) {
                $table->string('status', 50)->default('Pending'); // Add status column if it doesn't exist
            }
        });

        
        Schema::table('takeaways', function (Blueprint $table) {
            if (!Schema::hasColumn('takeaways', 'status')) {
                $table->string('status', 50)->default('Pending'); // Add status column if it doesn't exist
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            if (Schema::hasColumn('reservations', 'status')) {
                $table->dropColumn('status');
            }
        });

        // Remove status column from takeaways table
        Schema::table('takeaways', function (Blueprint $table) {
            if (Schema::hasColumn('takeaways', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
