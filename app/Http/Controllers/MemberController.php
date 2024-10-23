<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('members.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'department' => 'required|string|max:255',
            'nip' => 'required|string|max:50',
            'position' => 'required|string|max:100',
            'barcode' => 'required|string|max:100',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo
        ]);

        // Handle file upload and store member data
        $path = $request->file('photo')->store('photos', 'public');

        // Create member record
        Member::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'department' => $request->department,
            'nip' => $request->nip,
            'position' => $request->position,
            'barcode' => $request->barcode,
            'photo' => $path,
        ]);

        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return response()->json(['success' => true]);
    }

    public function getMemberData()
    {
        return response()->json(Member::all());
    }
}
