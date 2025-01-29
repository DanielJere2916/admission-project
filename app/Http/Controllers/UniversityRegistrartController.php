<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class UniversityRegistrartController extends Controller
{
    //
    public function index()
    {
    $totalUsersCount = User::where('role', '!=', 0)->count();
    $totalActiveprogramsCount = Program::where('program_status', true)->count();
    $totalActiveDepartmentsCount = Department::where('department_status', true)->count();
    $totalActiveFacultiesCount = Faculty::where('faculty_status', true)->count();
    
    return view('uregistrar.uregistrar', compact('totalUsersCount','totalActiveprogramsCount', 'totalActiveDepartmentsCount', 'totalActiveFacultiesCount'));
 
    }

}
