<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FinanceController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('employees', EmployeeController::class);
Route::resource('finances', FinanceController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('marketings', MarketingController::class);

// Rute untuk attendance
Route::get('employees/{employee}/attendance', [EmployeeController::class, 'attendance'])->name('employees.attendance.index');
Route::get('employees/{employee}/attendance/create', [EmployeeController::class, 'createAttendance'])->name('employees.attendance.create');
Route::post('employees/{employee}/attendance', [EmployeeController::class, 'storeAttendance'])->name('employees.attendance.store');
Route::put('attendance/{attendance}', [EmployeeController::class, 'updateAttendance'])->name('employees.attendance.update');
Route::put('attendance/{attendance}', [EmployeeController::class, 'updateAttendance'])->name('employees.attendance.update');
Route::delete('attendance/{attendance}', [EmployeeController::class, 'destroyAttendance'])->name('employees.attendance.destroy');

// Rute untuk leave
// Rute untuk menampilkan daftar cuti
Route::get('employees/{employee}/leave', [EmployeeController::class, 'indexLeave'])->name('employees.leave.index');
// Rute untuk membuat permintaan cuti baru
Route::get('employees/{employee}/leave/create', [EmployeeController::class, 'createLeave'])->name('employees.leave.create');
// Rute untuk menyimpan permintaan cuti
Route::post('employees/{employee}/leave', [EmployeeController::class, 'storeLeave'])->name('employees.leave.store');
// Rute untuk mengedit permintaan cuti
Route::get('employees/{employee}/leave/{leave}/edit', [EmployeeController::class, 'editLeave'])->name('employees.leave.edit');
// Rute untuk memperbarui permintaan cuti
Route::put('leave/{leave}', [EmployeeController::class, 'updateLeave'])->name('employees.leave.update');
// Rute untuk menghapus permintaan cuti
Route::delete('leave/{leave}', [EmployeeController::class, 'destroyLeave'])->name('employees.leave.destroy');

Route::get('/finances/{id}/cetak-invoice', [FinanceController::class, 'cetakInvoice'])->name('finances.cetak-invoice');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');




require __DIR__.'/auth.php';
