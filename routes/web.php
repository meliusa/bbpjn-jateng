<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GateController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboards.index');

Route::resource('/members', MemberController::class);
Route::get('/api/members', [MemberController::class, 'getMembersData']);

Route::resource('/gates', GateController::class);

Route::get('/logs', [LogController::class, 'index'])->name('logs.index');

