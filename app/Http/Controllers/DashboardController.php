<?php

namespace App\Http\Controllers;
use App\Models\Log;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $latestLog = Log::with(['member', 'gate'])->latest()->first();
        return view('dashboard', compact('latestLog'));
    }
}
