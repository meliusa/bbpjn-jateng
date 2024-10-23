<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboards.index');

Route::resource('/members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'getMemberData']);

Route::resource('/gates', GateController::class);
Route::get('/api/gates', [GateController::class, 'getGateData']);

Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
Route::get('/api/logs', [LogController::class, 'getLogData']);

