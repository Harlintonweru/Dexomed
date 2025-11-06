<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('equipment', function (Blueprint $table) {
            // Check if the user_id column exists before modifying it
            if (Schema::hasColumn('equipment', 'user_id')) {
                $table->foreignId('user_id')->nullable()->change();
            } else {
                // If user_id doesn't exist, create it as nullable
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipment', function (Blueprint $table) {
            if (Schema::hasColumn('equipment', 'user_id')) {
                $table->foreignId('user_id')->nullable(false)->change();
            }
        });
    }
};