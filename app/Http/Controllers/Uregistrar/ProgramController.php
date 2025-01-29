<?php

namespace App\Http\Controllers\Uregistrar;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $programs = Program::with('department')->get();
        $department= Department::all();
       
        return view('uregistrar.programs.index', compact('programs', 'department'));

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
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'program_name' => 'required|string|max:255|unique:programs,program_name',
            'program_acronym' => 'required|string|max:10|unique:programs,program_acronym',
        ], [
            'program_name.unique' => 'This program name already exists.',
            'program_acronym.unique' => 'This program acronym already exists.',
        ]);

        try {
            Program::create([
                'department_id' => $request->department_id,
                'program_name' => $request->program_name,
                'program_acronym' => $request->program_acronym,
                'program_status' => 1, // Default active
            ]);
            
            return redirect()->route('programs.index')
                ->with('success', 'Program created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('programs.index')
                ->with('error', 'Failed to create program. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'program_name' => 'required|string|max:255|unique:programs,program_name,' . $program->id,
            'program_acronym' => 'required|string|max:10|unique:programs,program_acronym,' . $program->id,
        ], [
            'program_name.unique' => 'This program name already exists.',
            'program_acronym.unique' => 'This program acronym already exists.',
        ]);

        try {
            $program->update([
                'department_id' => $request->department_id,
                'program_name' => $request->program_name,
                'program_acronym' => $request->program_acronym,
                'program_status' => $request->program_status ?? $program->program_status,
            ]);
            
            return redirect()->route('programs.index')
                ->with('success', 'Program updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('programs.index')
                ->with('error', 'Failed to update program. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        try {
            // Add any necessary checks before deletion
            // For example, check if program has any applications
            
            $program->delete();
            return redirect()->route('programs.index')
                ->with('success', 'Program deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('programs.index')
                ->with('error', 'Failed to delete program. Please try again.');
        }
    }
}
