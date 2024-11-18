<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('logs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        return response()->json($log->load(['member', 'gate']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        //
    }

    public function getLogData(Request $request)
    {
        $columns = ['id', 'gate.gate_code', 'member.name', 'member.barcode', 'created_at'];
    
        // Build the query with necessary joins and eager loading
        $logsQuery = Log::with(['member', 'gate'])
            ->when($request->search['value'], function($query) use ($request) {
                // Apply search filter if provided
                $query->where(function($query) use ($request) {
                    $query->whereHas('member', function($q) use ($request) {
                        $q->where('name', 'like', '%' . $request->search['value'] . '%');
                    })
                    ->orWhereHas('gate', function($q) use ($request) {
                        $q->where('gate_code', 'like', '%' . $request->search['value'] . '%');
                    });
                });
            })
            ->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']); // Handle sorting
    
        // Pagination
        $totalRecords = $logsQuery->count();
        $logs = $logsQuery->skip($request->start)
                          ->take($request->length)
                          ->get();
    
        // Return the data in the required format for DataTable
        return response()->json([
            'draw' => $request->draw,
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $logs,
        ]);
    }

    public function fetchLatestLog()
    {
        $latestLog = Log::with('member', 'gate')
            ->latest('updated_at')
            ->first();

        return response()->json($latestLog);
    }
    
}
