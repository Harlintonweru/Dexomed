<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_calibrations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalibrationsTable extends Migration
{
    public function up()
    {
        Schema::create('calibrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained()->onDelete('cascade');
            $table->enum('calibration_type', ['routine', 'preventive', 'corrective', 'certification']);
            $table->enum('priority', ['routine', 'urgent'])->default('routine');
            $table->date('preferred_date');
            $table->enum('preferred_time', ['morning', 'afternoon', 'evening']);
            $table->text('special_requirements')->nullable();
            $table->string('preferred_technician')->nullable();
            $table->boolean('is_urgent')->default(false);
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calibrations');
    }
}