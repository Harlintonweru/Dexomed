<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipment;
use App\Models\ServiceRequest;
use App\Models\Calibration;

class UserController extends Controller
{
    public function Dashboard()
    {
        if (Auth::check() && Auth::user()->type == "user") {
            // Your existing dashboard code...
            return view('dashboard');
        } elseif (Auth::check() && Auth::user()->type == "admin") {
            // Your existing admin dashboard code...
            return view('admin.dashboard');
        } else {
            return redirect('/');
        }
    }

    // Add this method for dashboard stats API
    public function getDashboardStats()
    {
        try {
            $stats = [
                'total_equipment' => Equipment::count(),
                'active_requests' => ServiceRequest::whereIn('status', ['pending', 'in_progress'])->count(),
                'upcoming_calibrations' => Calibration::where('status', 'scheduled')->count(),
                'recent_requests' => ServiceRequest::with('equipment')
                    ->latest()
                    ->limit(5)
                    ->get()
                    ->map(function($request) {
                        return [
                            'id' => $request->id,
                            'request_id' => $request->request_id,
                            'equipment_name' => $request->equipment->name ?? 'N/A',
                            'issue_type' => $request->issue_type,
                            'status' => $request->status,
                            'created_at' => $request->created_at,
                        ];
                    }),
                'recent_equipment' => Equipment::latest()
                    ->limit(5)
                    ->get()
                    ->map(function($equipment) {
                        return [
                            'id' => $equipment->id,
                            'name' => $equipment->name,
                            'model' => $equipment->model,
                            'status' => $equipment->status,
                            'created_at' => $equipment->created_at,
                        ];
                    })
            ];

            return response()->json([
                'success' => true,
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching dashboard stats: ' . $e->getMessage()
            ], 500);
        }
    }
}