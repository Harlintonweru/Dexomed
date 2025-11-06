<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ServiceRequestController extends Controller
{
    public function store(Request $request)
    {
        \Log::info('ServiceRequest store method called', ['request_data' => $request->all()]);
        
        $validator = Validator::make($request->all(), [
            'equipment_id' => 'required|exists:equipment,id',
            'issue_type' => 'required|in:mechanical,electrical,software,calibration,performance,other',
            'priority' => 'required|in:low,medium,high,urgent',
            'problem_description' => 'required|string',
            'issue_start_time' => 'required|date',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            \Log::error('ServiceRequest validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            \Log::info('Creating service request record', $request->all());
            
            $requestData = $request->all();
            $requestData['status'] = 'pending'; // Add default status
            
            \Log::info('Final data for creation:', $requestData);
            
            $serviceRequest = ServiceRequest::create($requestData);
            
            \Log::info('ServiceRequest created successfully', [
                'service_request_id' => $serviceRequest->id,
                'request_id' => $serviceRequest->request_id,
                'all_attributes' => $serviceRequest->toArray()
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Service request submitted successfully!',
                'request_id' => $serviceRequest->request_id,
                'service_request' => $serviceRequest
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error creating service request', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data_attempted' => $requestData ?? $request->all()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error submitting service request: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index()
    {
        try {
            $requests = ServiceRequest::with('equipment')
                ->latest()
                ->get();

            $stats = [
                'total' => ServiceRequest::count(),
                'pending' => ServiceRequest::where('status', 'pending')->count(),
                'in_progress' => ServiceRequest::where('status', 'in_progress')->count(),
                'completed' => ServiceRequest::where('status', 'completed')->count(),
            ];

            return response()->json([
                'success' => true,
                'requests' => $requests,
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching service requests', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error fetching service requests: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getEquipmentList()
    {
        try {
            $equipment = Equipment::select('id', 'name', 'model')->get();
            return response()->json($equipment);
        } catch (\Exception $e) {
            \Log::error('Error fetching equipment list', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error fetching equipment list: ' . $e->getMessage()
            ], 500);
        }
    }
    public function edit($id)
{
    try {
        $request = ServiceRequest::with('equipment')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'request' => $request
        ]);
    } catch (\Exception $e) {
        \Log::error('Error fetching service request for edit', ['error' => $e->getMessage()]);
        
        return response()->json([
            'success' => false,
            'message' => 'Service request not found'
        ], 404);
    }
}

public function update(Request $request, $id)
{
    \Log::info('Service request update method called', ['id' => $id, 'request_data' => $request->all()]);
    
    $validator = Validator::make($request->all(), [
        'equipment_id' => 'required|exists:equipment,id',
        'issue_type' => 'required|in:mechanical,electrical,software,calibration,performance,other',
        'priority' => 'required|in:low,medium,high,urgent',
        'problem_description' => 'required|string',
        'issue_start_time' => 'required|date',
        'contact_person' => 'required|string|max:255',
        'contact_phone' => 'required|string|max:20',
        'status' => 'required|in:pending,in_progress,completed,cancelled',
    ]);

    if ($validator->fails()) {
        \Log::error('Service request validation failed', ['errors' => $validator->errors()]);
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    try {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->update($request->all());
        
        \Log::info('Service request updated successfully', ['request_id' => $serviceRequest->id]);
        
        return response()->json([
            'success' => true,
            'message' => 'Service request updated successfully!',
            'request' => $serviceRequest
        ]);
        
    } catch (\Exception $e) {
        \Log::error('Error updating service request', [
            'error' => $e->getMessage(),
            'request_id' => $id
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Error updating service request: ' . $e->getMessage()
        ], 500);
    }
}
public function destroy($id)
{
    try {
        $serviceRequest = ServiceRequest::findOrFail($id);
        $requestId = $serviceRequest->request_id;
        $serviceRequest->delete();

        \Log::info('Service request deleted successfully', [
            'request_id' => $id,
            'service_request_id' => $requestId
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service request deleted successfully!'
        ]);

    } catch (\Exception $e) {
        \Log::error('Error deleting service request', [
            'error' => $e->getMessage(),
            'request_id' => $id
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Error deleting service request: ' . $e->getMessage()
        ], 500);
    }
}
}