<?php

namespace App\Http\Controllers\Uregistrar;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();
        return view('Uregistrar.faculties.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Uregistrar.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:255|unique:faculties,faculty_name',
        ], [
            'faculty_name.unique' => 'This faculty name already exists.',
        ]);
    
        try {
            Faculty::create([
                'faculty_name' => $request->faculty_name,
                'faculty_status' => 1, // Default status
            ]);
            
            return redirect()->route('faculties.index')
                ->with('success', 'Faculty created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('faculties.index')
                ->with('error', 'Failed to create faculty. Please try again.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faculty $faculty)
    {
        return response()->json([
            'id' => $faculty->id,
            'faculty_name' => $faculty->faculty_name,
            'faculty_status' => $faculty->faculty_status,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'faculty_name' => 'required|string|max:255|unique:faculties,faculty_name,' . $faculty->id,
        ], [
            'faculty_name.unique' => 'This faculty name already exists.',
        ]);

        try {
            $faculty->update([
                'faculty_name' => $request->faculty_name,
                'faculty_status' => $request->faculty_status ?? $faculty->faculty_status,
            ]);
            
            return redirect()->route('faculties.index')
                ->with('success', 'Faculty updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('faculties.index')
                ->with('error', 'Failed to update faculty. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        try {
            // Check if faculty has departments
            if ($faculty->departments()->count() > 0) {
                return redirect()->route('faculties.index')
                    ->with('error', 'Cannot delete faculty because it has associated departments.');
            }

            $faculty->delete();
            return redirect()->route('faculties.index')
                ->with('success', 'Faculty deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('faculties.index')
                ->with('error', 'Failed to delete faculty. Please try again.');
        }
    }
}
