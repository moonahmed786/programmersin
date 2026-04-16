<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    $services = \App\Models\Service::where('is_active', true)->orderBy('order')->get();
    $employees = \App\Models\User::where('role', 'employee')->where('is_active', true)->get();
    
    return view('pages.landing-page', compact('services', 'employees'));
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Portfolio/Showcase Routes
Route::get('/portfolio', [ProjectController::class, 'portfolio'])->name('portfolio.index');
Route::get('/portfolio/{slug}', [ProjectController::class, 'showcase'])->name('portfolio.show');

Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

// Grouped Protected Routes
Route::middleware(['auth'])->group(function () {
    
    // SuperAdmin Routes
    Route::middleware(['role:superadmin'])->prefix('admin')->as('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');
        
        Route::resource('projects', ProjectController::class);
        Route::resource('employees', \App\Http\Controllers\Admin\EmployeeController::class);
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
        Route::resource('menus', \App\Http\Controllers\Admin\MenuController::class);
        Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);

        Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('/inquiries/{inquiry}', [InquiryController::class, 'show'])->name('inquiries.show');
        Route::post('/inquiries/{inquiry}/notes', [InquiryController::class, 'storeNote'])->name('inquiries.store_note');
        Route::patch('/inquiries/{inquiry}/status', [InquiryController::class, 'updateStatus'])->name('inquiries.update_status');

        // Settings Routes
        Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });

    // Employee Routes
    Route::middleware(['role:employee'])->group(function () {
        Route::get('/employee/dashboard', [DashboardController::class, 'employee'])->name('employee.dashboard');
        Route::resource('employee/projects', ProjectController::class)->only(['index', 'show'])->names([
            'index' => 'employee.projects.index',
            'show' => 'employee.projects.show',
        ]);
    });

    // Customer Routes
    Route::middleware(['role:customer'])->group(function () {
        Route::get('/customer/dashboard', [DashboardController::class, 'customer'])->name('customer.dashboard');
        Route::resource('customer/projects', ProjectController::class)->only(['index', 'show'])->names([
            'index' => 'customer.projects.index',
            'show' => 'customer.projects.show',
        ]);
    });

});

// Static Page Routes
// Public Services Catalog
Route::get('/services-catalog', [\App\Http\Controllers\Admin\ServiceController::class, 'publicCatalog'])->name('services.catalog');


// Dynamic Page Catch-all
Route::get('{slug}', [\App\Http\Controllers\PageController::class, 'show'])->name('pages.public_show')->where('slug', '.*');
