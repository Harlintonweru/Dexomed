<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class UpdateCalibrationsStatusEnum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // For MySQL
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE calibrations MODIFY COLUMN status ENUM('scheduled', 'in_progress', 'completed', 'cancelled', 'due_soon', 'overdue') NOT NULL DEFAULT 'scheduled'");
        }
        
        // For PostgreSQL
        elseif (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement("ALTER TABLE calibrations DROP CONSTRAINT calibrations_status_check");
            DB::statement("ALTER TABLE calibrations ADD CONSTRAINT calibrations_status_check CHECK (status IN ('scheduled', 'in_progress', 'completed', 'cancelled', 'due_soon', 'overdue'))");
        }
        
        // For SQLite (you'll need to recreate the table)
        elseif (DB::connection()->getDriverName() === 'sqlite') {
            // SQLite doesn't support ALTER TABLE for ENUM, so we need to recreate
            // This is a simplified version - you might need a more complex approach for production
            Schema::table('calibrations', function (Blueprint $table) {
                $table->text('status')->default('scheduled')->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // For MySQL
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE calibrations MODIFY COLUMN status ENUM('scheduled', 'in_progress', 'completed', 'cancelled') NOT NULL DEFAULT 'scheduled'");
        }
        
        // For PostgreSQL
        elseif (DB::connection()->getDriverName() === 'pgsql') {
            DB::statement("ALTER TABLE calibrations DROP CONSTRAINT calibrations_status_check");
            DB::statement("ALTER TABLE calibrations ADD CONSTRAINT calibrations_status_check CHECK (status IN ('scheduled', 'in_progress', 'completed', 'cancelled'))");
        }
        
        // For SQLite
        elseif (DB::connection()->getDriverName() === 'sqlite') {
            Schema::table('calibrations', function (Blueprint $table) {
                $table->text('status')->default('scheduled')->change();
            });
        }
    }
}