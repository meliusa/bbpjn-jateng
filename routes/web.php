<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboards.index');

// Member Routes
Route::resource('/members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'getMemberData']);

// Gate Routes
Route::resource('/gates', GateController::class);
Route::get('/api/gates', [GateController::class, 'getGateData']);

// Log Routes
Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
Route::get('/api/logs', [LogController::class, 'getLogData']);
Route::get('/api/logs/{log}', [LogController::class, 'show']);
