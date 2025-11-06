<?php

namespace App\Http\Controllers;

use App\Models\Calibration;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CalibrationController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('Calibration store method called', ['request_data' => $request->all()]);
        
        $validator = Validator::make($request->all(), [
            'equipment_id' => 'required|exists:equipment,id',
            'calibration_type' => 'required|in:routine,preventive,corrective,certification',
            'priority' => 'required|in:routine,urgent',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required|in:morning,afternoon,evening',
            'special_requirements' => 'nullable|string',
            'preferred_technician' => 'nullable|string|max:255',
            'is_urgent' => 'boolean',
        ]);

        if ($validator->fails()) {
            \Log::error('Calibration validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            \Log::info('Creating calibration record', $request->all());
            
            $calibrationData = $request->all();
            $calibrationData['status'] = 'scheduled'; // Add default status
            
            \Log::info('Final data for creation:', $calibrationData);
            
            $calibration = Calibration::create($calibrationData);
            
            \Log::info('Calibration created successfully', [
                'calibration_id' => $calibration->id,
                'all_attributes' => $calibration->toArray()
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Calibration scheduled successfully!',
                'calibration' => $calibration
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error creating calibration', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data_attempted' => $calibrationData ?? $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error scheduling calibration: ' . $e->getMessage()
            ], 500);
        }
    }

    // Keep your existing index method and any other methods
    public function index()
    {
        try {
            $calibrations = Calibration::with('equipment')
                ->latest()
                ->get();

            $stats = [
                'total' => Calibration::count(),
                'due_soon' => Calibration::where('status', 'due_soon')->count(),
                'overdue' => Calibration::where('status', 'overdue')->count(),
                'completed' => Calibration::where('status', 'completed')->count(),
            ];

            return response()->json([
                'success' => true,
                'calibrations' => $calibrations,
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching calibrations', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error fetching calibrations: ' . $e->getMessage()
            ], 500);
        }
    }
    public function edit($id)
{
    try {
        $calibration = Calibration::with('equipment')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'calibration' => $calibration
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching calibration for edit', ['error' => $e->getMessage()]);
        
        return response()->json([
            'success' => false,
            'message' => 'Calibration not found'
        ], 404);
    }
}

public function update(Request $request, $id)
{
    \Log::info('Calibration update method called', ['id' => $id, 'request_data' => $request->all()]);
    
    $validator = Validator::make($request->all(), [
        'equipment_id' => 'required|exists:equipment,id',
        'calibration_type' => 'required|in:routine,preventive,corrective,certification',
        'priority' => 'required|in:routine,urgent',
        'preferred_date' => 'required|date',
        'preferred_time' => 'required|in:morning,afternoon,evening',
        'special_requirements' => 'nullable|string',
        'preferred_technician' => 'nullable|string|max:255',
        'is_urgent' => 'boolean',
        'status' => 'required|in:scheduled,in_progress,completed,cancelled,due_soon,overdue',
    ]);

    if ($validator->fails()) {
        \Log::error('Calibration validation failed', ['errors' => $validator->errors()]);
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        $calibration = Calibration::findOrFail($id);
        $calibration->update($request->all());
        
        \Log::info('Calibration updated successfully', ['calibration_id' => $calibration->id]);
        
        return response()->json([
            'success' => true,
            'message' => 'Calibration updated successfully!',
            'calibration' => $calibration
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Error updating calibration', [
            'error' => $e->getMessage(),
            'calibration_id' => $id
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Error updating calibration: ' . $e->getMessage()
        ], 500);
    }
}

public function complete($id)
{
    try {
        $calibration = Calibration::findOrFail($id);
        $calibration->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);
        
        \Log::info('Calibration marked as completed', ['calibration_id' => $calibration->id]);
        
        return response()->json([
            'success' => true,
            'message' => 'Calibration marked as completed!',
            'calibration' => $calibration
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Error completing calibration', [
            'error' => $e->getMessage(),
            'calibration_id' => $id
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Error completing calibration: ' . $e->getMessage()
        ], 500);
    }
}
public function destroy($id)
{
    try {
        $calibration = Calibration::with('equipment')->findOrFail($id);
        $equipmentName = $calibration->equipment->name ?? 'Unknown Equipment';
        $calibration->delete();

        \Log::info('Calibration deleted successfully', [
            'calibration_id' => $id,
            'equipment_name' => $equipmentName
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Calibration deleted successfully!'
        ]);

    } catch (\Exception $e) {
        \Log::error('Error deleting calibration', [
            'error' => $e->getMessage(),
            'calibration_id' => $id
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Error deleting calibration: ' . $e->getMessage()
        ], 500);
    }
}
}