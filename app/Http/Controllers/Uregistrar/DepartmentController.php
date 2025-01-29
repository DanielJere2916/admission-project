<?php

namespace App\Http\Controllers\Uregistrar;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // This line of code fetches all departments from the database and includes their associated faculties.
        // The 'with' method is used to eager load the 'faculty' relationship defined in the Department model.
        // This approach helps reduce the number of database queries by fetching all necessary data in a single query.
        $departments = Department::with('faculty')->get();
        $faculties = Faculty::all();
        return view('uregistrar.departments.index', compact('departments', 'faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all(); // Fetch faculties for the dropdown
        return view('uregistrar.departments.index', compact('faculties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'faculty_id' => 'required|exists:faculties,id',
            'department_name' => 'required|string|max:255|unique:departments,department_name',
            'department_acronym' => 'required|string|max:10|unique:departments,department_acronym',
        ], [
            'department_name.unique' => 'This department name already exists.',
            'department_acronym.unique' => 'This department acronym already exists.',
        ]);

        try {
            Department::create([
                'faculty_id' => $request->faculty_id,
                'department_name' => $request->department_name,
                'department_acronym' => $request->department_acronym,
                'department_status' => 1, // Default active
            ]);
            
            return redirect()->route('departments.index')
                ->with('success', 'Department created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('departments.index')
                ->with('error', 'Failed to create department. Please try again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'faculty_id' => 'required|exists:faculties,id',
            'department_name' => 'required|string|max:255|unique:departments,department_name,' . $department->id,
            'department_acronym' => 'required|string|max:10|unique:departments,department_acronym,' . $department->id,
        ], [
            'department_name.unique' => 'This department name already exists.',
            'department_acronym.unique' => 'This department acronym already exists.',
        ]);

        try {
            $department->update([
                'faculty_id' => $request->faculty_id,
                'department_name' => $request->department_name,
                'department_acronym' => $request->department_acronym,
                'department_status' => $request->department_status ?? $department->department_status,
            ]);
            
            return redirect()->route('departments.index')
                ->with('success', 'Department updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('departments.index')
                ->with('error', 'Failed to update department. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {
            // Check if department has programs
            if ($department->programs()->count() > 0) {
                return redirect()->route('departments.index')
                    ->with('error', 'Cannot delete department because it has associated programs.');
            }

            $department->delete();
            return redirect()->route('departments.index')
                ->with('success', 'Department deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('departments.index')
                ->with('error', 'Failed to delete department. Please try again.');
        }
    }
}