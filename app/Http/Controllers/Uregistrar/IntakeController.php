<?php

namespace App\Http\Controllers\Uregistrar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Intake; // Import the Intake model

class IntakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intakes = Intake::all(); // Fetch all intakes
        return view('uregistrar.intakes.index', compact('intakes')); // Pass data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uregistrar.intakes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'education' => 'required|array', // Ensure at least one checkbox is selected
            'education.*' => 'string|max:255', // Validate each checkbox value
            'month' => 'required|string|max:255', // Intake name (e.g., January)
            'academic_year' => 'required|string|max:9', // Academic year (e.g., 2023/24)
            'intake_start' => 'required|date', // Ensure intake_start is provided
            'intake_end' => 'required|date|after:intake_start', // Ensure intake_end is after intake_start
            'post_fees' => 'nullable|numeric', // Postgraduate fees (optional)
            'other_fees' => 'required|numeric', // Other fees (required)
        ]);

        // Check if any intake of the selected types is already active
        $activeIntakeExists = Intake::where('intake_status', true)
            ->whereIn('intake_type', $request->input('education')) // Check for active intakes of the selected types
            ->exists();
        if ($activeIntakeExists) {
            return redirect()->back()->with('error', 'An active intake of the selected type already exists.');
        }

        try {
            // Loop through each checked education type
            foreach ($request->input('education') as $education) {
                // Set fees based on intake type
                $fees = ($education === "Postgraduate") ? $request->input('post_fees') : $request->input('other_fees');

                // Create a new intake record
                Intake::create([
                    'intake_type' => $education,
                    'academic_year' => $request->input('academic_year'),
                    'intake_name' => $request->input('month'),
                    'intake_start' => $request->input('intake_start'), // Correct field name
                    'intake_end' => $request->input('intake_end'), // Correct field name
                    'application_fees' => $fees,
                    'intake_status' => true, // Default to active
                ]);
            }

            return redirect()->route('intakes.index')->with('success', 'Intake created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create intake. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intake $intake)
    {
        return view('uregistrar.intakes.edit', compact('intake'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intake $intake)
    {
        $validatedData = $request->validate([
            'month' => 'required|string|max:255',
            'academic_year' => 'required|string|max:9',
            'intake_start' => 'required|date',
            'intake_end' => 'required|date|after:intake_start',
            'application_fees' => 'required|numeric',
        ]);

        try {
            $intake->update($validatedData);
            return redirect()->route('intakes.index')->with('success', 'Intake updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update intake. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intake $intake)
    {
        try {
            $intake->delete();
            return redirect()->route('intakes.index')->with('success', 'Intake deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete intake. Please try again.');
        }
    }

    /**
     * Toggle the status of the specified resource.
     */
    public function toggleStatus(Intake $intake)
    {
        try {
            $intake->update(['intake_status' => !$intake->intake_status]);
            $status = $intake->intake_status ? 'activated' : 'deactivated';
            return redirect()->route('intakes.index')->with('success', "Intake {$status} successfully!");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update intake status. Please try again.');
        }
    }
}