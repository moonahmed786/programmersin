<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return view('pages.landing-page'); // Use the homepage
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

// Grouped Protected Routes
Route::middleware(['auth'])->group(function () {
    
    // SuperAdmin Routes
    Route::middleware(['role:superadmin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::resource('admin/projects', ProjectController::class)->names([
            'index' => 'admin.projects.index',
            'create' => 'admin.projects.create',
            'store' => 'admin.projects.store',
            'show' => 'admin.projects.show',
            'edit' => 'admin.projects.edit',
            'update' => 'admin.projects.update',
            'destroy' => 'admin.projects.destroy',
        ]);
        Route::resource('admin/inquiries', InquiryController::class)->only(['index', 'show'])->names([
            'index' => 'admin.inquiries.index',
            'show' => 'admin.inquiries.show',
        ]);
        Route::patch('admin/inquiries/{inquiry}/status', [InquiryController::class, 'updateStatus'])->name('admin.inquiries.update_status');
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

// Static Page Routes from Stitch
Route::prefix('pages')->group(function () {
    Route::get('/product-gallery', function () { return view('pages.product-gallery'); });
    Route::get('/services-management', function () { return view('pages.services-management'); })->name('admin.services.index');
    Route::get('/product-showcase', function () { return view('pages.product-showcase'); });
    Route::get('/dashboard-overview', function () { return view('pages.dashboard-overview'); });
    Route::get('/public-pricing', function () { return view('pages.public-pricing'); });
    Route::get('/landing-page', function () { return view('pages.landing-page'); });
    Route::get('/services-catalog', function () { return view('pages.services-catalog'); });
});
