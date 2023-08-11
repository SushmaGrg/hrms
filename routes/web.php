<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TimeEntryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();

// admin routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// user management
    Route::resource('users', UserController::class);
    Route::get('export_users_pdf', [UserController::class, 'export_users_pdf'])->name('export_users_pdf');

    Route::resource('profile', ProfileController::class);
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
// attendance management
    Route::resource('attendance', AttendanceController::class);
// department management
    Route::resource('departments', DepartmentController::class);
    // Route::resource('leaves', LeaveController::class);

// leave management
    Route::get('leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::get('leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::get('leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('leaves/store', [LeaveController::class, 'store'])->name('leaves.store');
    Route::get('leaves/{leave}', [LeaveController::class, 'show'])->name('leaves.show');
    Route::get('leaves/{leave}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
    Route::put('leaves/{leave}', [LeaveController::class, 'update'])->name('leaves.update');
    Route::delete('leaves/{leave}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
    // approve/reject leave
    Route::put('/leaves/{leave}/approve', [LeaveController::class, 'approve'])->name('leaves.approve');
    Route::put('/leaves/{leave}/reject', [LeaveController::class, 'reject'])->name('leaves.reject');
    Route::resource('salaries', SalaryController::class);
    Route::resource('notices', NoticeController::class);
    Route::resource('time-entries', TimeEntryController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// User routes
Route::middleware('auth')->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('attendance', AttendanceController::class);
    Route::resource('profile', ProfileController::class);
    Route::get('leaves', [LeaveController::class, 'index'])->name('leaves.index');
    Route::get('leaves/create', [LeaveController::class, 'create'])->name('leaves.create');
    Route::post('leaves/store', [LeaveController::class, 'store'])->name('leaves.store');
    Route::get('leaves/{leave}', [LeaveController::class, 'show'])->name('leaves.show');
    Route::get('leaves/{leave}/edit', [LeaveController::class, 'edit'])->name('leaves.edit');
    Route::put('leaves/{leave}', [LeaveController::class, 'update'])->name('leaves.update');
    Route::delete('leaves/{leave}', [LeaveController::class, 'destroy'])->name('leaves.destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::resource('time-entries', TimeEntryController::class);
});
