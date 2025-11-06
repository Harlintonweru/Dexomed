<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calibration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'equipment_id',
    'calibration_type',
    'priority',
    'preferred_date',
    'preferred_time',
    'special_requirements',
    'preferred_technician',
    'is_urgent',
    'status',
    'completed_at' // Add this line
];

protected $casts = [
    'preferred_date' => 'date',
    'is_urgent' => 'boolean',
    'completed_at' => 'datetime', // Add this line
];

    /**
     * Get the equipment that owns the calibration.
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}