<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'equipment_id',
        'request_id',
        'issue_type',
        'priority',
        'problem_description',
        'issue_start_time',
        'contact_person',
        'contact_phone',
        'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'issue_start_time' => 'datetime',
    ];

    /**
     * Get the equipment that owns the service request.
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    /**
     * Bootstrap the model and its traits.
     */
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($serviceRequest) {
            // Generate request ID automatically
            if (empty($serviceRequest->request_id)) {
                $year = date('Y');
                $lastRequest = ServiceRequest::whereYear('created_at', $year)
                    ->orderBy('id', 'desc')
                    ->first();
                
                $nextNumber = $lastRequest ? 
                    (int) substr($lastRequest->request_id, -3) + 1 : 1;
                
                $serviceRequest->request_id = 'SR-' . $year . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            }
        });
    }
}