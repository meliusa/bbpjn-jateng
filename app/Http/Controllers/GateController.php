<?php

namespace App\Http\Controllers;

use App\Models\Gate;
use Illuminate\Http\Request;

class GateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('gates.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'gate_code' => 'required|string|max:255',
            'gate_number' => 'required|string|max:255',
            'door_number' => 'required|string|max:255',
        ]);
    
        // Create a new gate
        $gate = Gate::create($request->all());
    
        // Return a response
        return response()->json($gate, 201); // 201 Created
    }

    /**
     * Display the specified resource.
     */
    public function show(Gate $gate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gate $gate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gate $gate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gate $gate)
    {
        $gate->delete();
        return response()->json(['success' => true]);
    }

    public function getGateData()
    {
        return response()->json(Gate::all());
    }
}
