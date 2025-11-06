<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Fetch recent activities
        $activities = DB::table('activities')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Fetch equipment owned by this user
        $equipment = DB::table('equipment')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Equipment health overview
        $operational = $equipment->where('status', 'Operational')->count();
        $attention = $equipment->where('status', 'Needs Attention')->count();
        $maintenance = $equipment->where('status', 'Under Maintenance')->count();

        // Return the view with the fetched data
        return view('dashboard.index', compact(
            'activities',
            'equipment',
            'operational',
            'attention',
            'maintenance'
        ));
    }
}

