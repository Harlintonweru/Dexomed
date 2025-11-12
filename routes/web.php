<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\CalibrationController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'Dashboard'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Dashboard Stats Route
Route::get('/dashboard/stats', [UserController::class, 'getDashboardStats'])
    ->middleware(['auth'])->name('dashboard.stats');

// Equipment Routes
Route::middleware(['auth'])->group(function () {
    // Equipment routes
    Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
    Route::post('/equipment/store', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::get('/equipment/list', [EquipmentController::class, 'index'])->name('equipment.list');
    Route::get('/equipment/options', [EquipmentController::class, 'getEquipmentOptions'])->name('equipment.options');
    
    // Service Request routes
    Route::get('/service-requests', [ServiceRequestController::class, 'index'])->name('service-requests.index');
    Route::post('/service-requests/store', [ServiceRequestController::class, 'store'])->name('service-requests.store');
    
    // Calibration routes
    Route::get('/calibrations', [CalibrationController::class, 'index'])->name('calibrations.index');
    Route::post('/calibrations/store', [CalibrationController::class, 'store'])->name('calibrations.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/send-message', [ContactController::class, 'send'])->name('contact.send');

// Temporary test route - remove after testing
Route::get('/test-equipment-route', function() {
    return response()->json([
        'message' => 'Equipment route is working',
        'route' => route('equipment.store')
    ]);
});
// Equipment routes
Route::get('/equipment/{id}/edit', [EquipmentController::class, 'edit']);
Route::put('/equipment/{id}', [EquipmentController::class, 'update']);

// Service request routes
Route::get('/service-requests/{id}/edit', [ServiceRequestController::class, 'edit']);
Route::put('/service-requests/{id}', [ServiceRequestController::class, 'update']);

// Calibration routes
Route::get('/calibrations/{id}/edit', [CalibrationController::class, 'edit']);
Route::put('/calibrations/{id}', [CalibrationController::class, 'update']);
Route::post('/calibrations/{id}/complete', [CalibrationController::class, 'complete']);

// Equipment routes
Route::delete('/equipment/{id}', [EquipmentController::class, 'destroy']);

// Service request routes  
Route::delete('/service-requests/{id}', [ServiceRequestController::class, 'destroy']);

// Calibration routes
Route::delete('/calibrations/{id}', [CalibrationController::class, 'destroy']);


require __DIR__.'/auth.php';
