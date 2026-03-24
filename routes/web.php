<?php

use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
// Route::get('/', fn() => redirect()->route('login'));

// ─── TEACHER ROUTES ───────────────────────────────────────
Route::middleware(['auth', 'role:teacher'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', [LeaveRequestController::class, 'teacherDashboard'])->name('dashboard');
    Route::get('/leave/create', [LeaveRequestController::class, 'create'])->name('leave.create');
    Route::post('/leave', [LeaveRequestController::class, 'store'])->name('leave.store');
    Route::get('/leave/{leaveRequest}', [LeaveRequestController::class, 'show'])->name('leave.show');
});

// ─── ADMIN ROUTES ─────────────────────────────────────────
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [LeaveRequestController::class, 'adminDashboard'])->name('dashboard');
    Route::get('/leave/{leaveRequest}', [LeaveRequestController::class, 'show'])->name('leave.show');
    Route::patch('/leave/{leaveRequest}/status', [LeaveRequestController::class, 'updateStatus'])->name('leave.updateStatus');
    Route::delete('/leave/{leaveRequest}', [LeaveRequestController::class, 'destroy'])->name('leave.destroy');
});

require __DIR__.'/auth.php';