<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
                // Call the FacultySeeder first
                $this->call(FacultySeeder::class);

                // Call the DepartmentSeeder
                $this->call(DepartmentSeeder::class);

                // Call the UserSeeder
                $this->call(UserSeeder::class);

                // Call the ProgramSeeder
                $this->call(ProgramSeeder::class);
        
        

    }
}
