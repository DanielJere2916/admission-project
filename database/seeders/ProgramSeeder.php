<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for programs
        $programs = [
            [
                'department_id' => 1, // References Department of Physics
                'program_name' => 'Bachelor of Science in Physics',
                'program_acronym' => 'BSc Physics',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 1, // References Department of Physics
                'program_name' => 'Master of Science in Physics',
                'program_acronym' => 'MSc Physics',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 2, // References Department of Chemistry
                'program_name' => 'Bachelor of Science in Chemistry',
                'program_acronym' => 'BSc Chemistry',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 3, // References Department of Civil Engineering
                'program_name' => 'Bachelor of Engineering in Civil Engineering',
                'program_acronym' => 'BE Civil',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 4, // References Department of Electrical Engineering
                'program_name' => 'Bachelor of Engineering in Electrical Engineering',
                'program_acronym' => 'BE Electrical',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 5, // References Department of English
                'program_name' => 'Bachelor of Arts in English',
                'program_acronym' => 'BA English',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 6, // References Department of Surgery
                'program_name' => 'Bachelor of Medicine and Bachelor of Surgery',
                'program_acronym' => 'MBBS',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 7, // References Department of Criminal Law
                'program_name' => 'Bachelor of Laws',
                'program_acronym' => 'LLB',
                'program_status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the programs table
        DB::table('programs')->insert($programs);
    }
}