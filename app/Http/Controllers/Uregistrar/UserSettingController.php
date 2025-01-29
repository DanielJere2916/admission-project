<?php

namespace App\Http\Controllers\Uregistrar;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\StaffRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('staffRecord')->get(); // Fetch all users with their staff records
        $departments = Department::all(); // Fetch all departments
        return view('uregistrar.users.index', compact('users', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|integer',
            'department_id' => 'required|exists:departments,id',
            'gender' => 'required|string',
            'country' => 'required|string',
            'phonenumber' => 'required|string',
            'village' => 'required|string',
            'qualification' => 'required|string',
        ]);

        try {
            // Begin transaction
            DB::beginTransaction();

            // Generate employee ID
            $currentYear = date('Y');
            $randomNumber = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $employeeId = "EMPL/{$randomNumber}/{$currentYear}";

            // Create user with default password
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('12345678'), // Default password
                'role' => $request->role,
                'gender' => $request->gender,
                'country' => $request->country,
                'phonenumber' => $request->phonenumber,
                'department_id' => $request->department_id,
            ]);

            // Create staff record
            StaffRecord::create([
                'user_id' => $user->id,
                'employee_id' => $employeeId,
                'village' => $request->village,
                'qualification' => $request->qualification,
            ]);

            DB::commit();
            
            return redirect()->route('users.index')
                ->with('success', 'User created successfully. Default password is: 12345678');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('users.index')
                ->with('error', 'Failed to create user. Please try again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|integer',
            'department_id' => 'required|exists:departments,id',
            'gender' => 'required|string',
            'country' => 'required|string',
            'phonenumber' => 'required|string',
            'village' => 'required|string',
            'qualification' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            // Update user
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'gender' => $request->gender,
                'country' => $request->country,
                'phonenumber' => $request->phonenumber,
                'department_id' => $request->department_id,
            ]);

            // Update staff record
            $user->staffRecord->update([
                'village' => $request->village,
                'qualification' => $request->qualification,
            ]);

            DB::commit();
            
            return redirect()->route('users.index')
                ->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('users.index')
                ->with('error', 'Failed to update user. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            // Delete staff record first (due to foreign key constraint)
            if ($user->staffRecord) {
                $user->staffRecord->delete();
            }
            
            // Delete user
            $user->delete();

            DB::commit();
            return redirect()->route('users.index')
                ->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('users.index')
                ->with('error', 'Failed to delete user. Please try again.');
        }
    }
}