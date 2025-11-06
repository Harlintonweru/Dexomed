<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the equipment.
     */
    public function index()
    {
        try {
            // Check if user is authenticated
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            // Only get equipment belonging to the authenticated user
            $equipment = Equipment::where('user_id', auth()->id())->latest()->get();
            
            $stats = [
                'total' => Equipment::where('user_id', auth()->id())->count(),
                'operational' => Equipment::where('user_id', auth()->id())->where('status', 'operational')->count(),
                'maintenance' => Equipment::where('user_id', auth()->id())->where('status', 'maintenance')->count(),
                'attention' => Equipment::where('user_id', auth()->id())->where('status', 'attention')->count(),
            ];

            return response()->json([
                'success' => true,
                'equipment' => $equipment,
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching equipment', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error fetching equipment: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created equipment in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Equipment store method called', [
            'request_data' => $request->all(),
            'user_id' => auth()->id(),
            'authenticated' => auth()->check()
        ]);
        
        // Check if user is authenticated
        if (!auth()->check()) {
            \Log::error('User not authenticated when trying to add equipment');
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated. Please log in again.'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'serial_number' => 'required|string|unique:equipment,serial_number',
            'manufacturer' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'warranty_expiry' => 'nullable|date',
            'location_department' => 'required|string|max:255',
            'status' => 'required|in:operational,maintenance,attention',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            \Log::error('Equipment validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            \Log::info('Creating equipment record', [
                'request_data' => $request->all(),
                'user_id' => auth()->id()
            ]);
            
            // Create equipment with explicit user_id
            $equipment = Equipment::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'model' => $request->model,
                'serial_number' => $request->serial_number,
                'manufacturer' => $request->manufacturer,
                'purchase_date' => $request->purchase_date,
                'warranty_expiry' => $request->warranty_expiry,
                'location_department' => $request->location_department,
                'status' => $request->status,
                'notes' => $request->notes,
            ]);
            
            \Log::info('Equipment created successfully', [
                'equipment_id' => $equipment->id,
                'user_id' => $equipment->user_id
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Equipment added successfully!',
                'equipment' => $equipment
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error creating equipment', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => auth()->id()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error adding equipment: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified equipment.
     */
    public function show($id)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $equipment = Equipment::where('user_id', auth()->id())->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'equipment' => $equipment
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching equipment details', ['error' => $e->getMessage()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Equipment not found'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified equipment.
     */
    public function edit($id)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $equipment = Equipment::where('user_id', auth()->id())->findOrFail($id);
            
            return response()->json([
                'success' => true,
                'equipment' => $equipment
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching equipment for edit', ['error' => $e->getMessage()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Equipment not found'
            ], 404);
        }
    }

    /**
     * Update the specified equipment in storage.
     */
    public function update(Request $request, $id)
    {
        \Log::info('Equipment update method called', [
            'id' => $id, 
            'request_data' => $request->all(),
            'user_id' => auth()->id()
        ]);
        
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255|unique:equipment,serial_number,' . $id,
            'manufacturer' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'warranty_expiry' => 'nullable|date',
            'location_department' => 'required|string|max:255',
            'status' => 'required|in:operational,maintenance,attention',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            \Log::error('Equipment validation failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $equipment = Equipment::where('user_id', auth()->id())->findOrFail($id);
            $equipment->update($request->all());
            
            \Log::info('Equipment updated successfully', ['equipment_id' => $equipment->id]);
            
            return response()->json([
                'success' => true,
                'message' => 'Equipment updated successfully!',
                'equipment' => $equipment
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error updating equipment', [
                'error' => $e->getMessage(),
                'equipment_id' => $id
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error updating equipment: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified equipment from storage.
     */
    public function destroy($id)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $equipment = Equipment::where('user_id', auth()->id())->findOrFail($id);
            $equipmentName = $equipment->name;
            $equipment->delete();

            \Log::info('Equipment deleted successfully', [
                'equipment_id' => $id, 
                'equipment_name' => $equipmentName,
                'user_id' => auth()->id()
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Equipment deleted successfully!'
            ]);

        } catch (\Exception $e) {
            \Log::error('Error deleting equipment', [
                'error' => $e->getMessage(),
                'equipment_id' => $id,
                'user_id' => auth()->id()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error deleting equipment: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get equipment options for dropdowns.
     */
    public function getEquipmentOptions()
    {
        try {
            if (!auth()->check()) {
                return response()->json([], 401);
            }

            $equipment = Equipment::select('id', 'name', 'model', 'status')
                ->where('user_id', auth()->id())
                ->where('status', '!=', 'maintenance')
                ->get();

            return response()->json($equipment);
        } catch (\Exception $e) {
            \Log::error('Error fetching equipment options', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error fetching equipment options: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get equipment statistics.
     */
    public function getStats()
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $stats = [
                'total' => Equipment::where('user_id', auth()->id())->count(),
                'operational' => Equipment::where('user_id', auth()->id())->where('status', 'operational')->count(),
                'maintenance' => Equipment::where('user_id', auth()->id())->where('status', 'maintenance')->count(),
                'attention' => Equipment::where('user_id', auth()->id())->where('status', 'attention')->count(),
            ];

            return response()->json([
                'success' => true,
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            \Log::error('Error fetching equipment stats', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error fetching equipment statistics: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Search equipment by name, model, or serial number.
     */
    public function search(Request $request)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $searchTerm = $request->get('q');

            $equipment = Equipment::where('user_id', auth()->id())
                ->where(function($query) use ($searchTerm) {
                    $query->where('name', 'like', "%{$searchTerm}%")
                          ->orWhere('model', 'like', "%{$searchTerm}%")
                          ->orWhere('serial_number', 'like', "%{$searchTerm}%");
                })
                ->get();

            return response()->json([
                'success' => true,
                'equipment' => $equipment
            ]);
        } catch (\Exception $e) {
            \Log::error('Error searching equipment', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error searching equipment: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update equipment status.
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            $validator = Validator::make($request->all(), [
                'status' => 'required|in:operational,maintenance,attention'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            $equipment = Equipment::where('user_id', auth()->id())->findOrFail($id);
            $equipment->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Equipment status updated successfully!',
                'equipment' => $equipment
            ]);

        } catch (\Exception $e) {
            \Log::error('Error updating equipment status', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Error updating equipment status: ' . $e->getMessage()
            ], 500);
        }
    }
}