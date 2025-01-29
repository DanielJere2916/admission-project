<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for faculties
        $faculties = [
            [
                'faculty_name' => 'Faculty of Science',
                'faculty_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'Faculty of Engineering',
                'faculty_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'Faculty of Arts',
                'faculty_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'Faculty of Medicine',
                'faculty_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'faculty_name' => 'Faculty of Law',
                'faculty_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the faculties table
        DB::table('faculties')->insert($faculties);
    }
}