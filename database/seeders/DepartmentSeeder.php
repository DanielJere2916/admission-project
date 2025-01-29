<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for departments
        $departments = [
            [
                'faculty_id' => 1, // References Faculty of Science
                'department_name' => 'Department of Physics',
                'department_acronym' => 'PHY',
                'department_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 1, // References Faculty of Science
                'department_name' => 'Department of Chemistry',
                'department_acronym' => 'CHEM',
                'department_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 2, // References Faculty of Engineering
                'department_name' => 'Department of Civil Engineering',
                'department_acronym' => 'CIV',
                'department_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 2, // References Faculty of Engineering
                'department_name' => 'Department of Electrical Engineering',
                'department_acronym' => 'EE',
                'department_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 3, // References Faculty of Arts
                'department_name' => 'Department of English',
                'department_acronym' => 'ENG',
                'department_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 4, // References Faculty of Medicine
                'department_name' => 'Department of Surgery',
                'department_acronym' => 'SUR',
                'department_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_id' => 5, // References Faculty of Law
                'department_name' => 'Department of Criminal Law',
                'department_acronym' => 'CRL',
                'department_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the departments table
        DB::table('departments')->insert($departments);
    }
}