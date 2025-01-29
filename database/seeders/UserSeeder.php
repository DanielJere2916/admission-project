<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample data for users
        $users = [
            [
                'name' => 'Registrar',
                'email' => 'Registrar@example.com',
                'role' => 1, // Admin role
                'applicant_id' => null, // Nullable
                'gender' => 'Male', // Add gender
                'country' => 'USA', // Add country
                'phonenumber' => '1234567890', // Add phone number
                'password' => Hash::make('password'), // Hashed password
                'department_id' => 1, // Associate with department_id = 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zwangwe',
                'email' => 'Zwangwe@example.com',
                'role' => 0, // Regular applicant role
                'applicant_id' => 'APP12345', // Example applicant ID
                'gender' => 'Female', // Add gender
                'country' => 'Zambia', // Add country
                'phonenumber' => '0987654321', // Add phone number
                'password' => Hash::make('password'), // Hashed password
                'department_id' => 2, // Associate with department_id = 2
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Micheal Tyson',
                'email' => 'Micheal@example.com',
                'role' => 0, // Regular user role
                'applicant_id' => 'APP67890', // Example applicant ID
                'gender' => 'Male', // Add gender
                'country' => 'UK', // Add country
                'phonenumber' => '1122334455', // Add phone number
                'password' => Hash::make('password'), // Hashed password
                'department_id' => 3, // Associate with department_id = 3
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Uregistrar',
                'email' => 'jeredaniel2816@gmail.com',
                'role' => 4, // Regular user role
                'applicant_id' => null, // Nullable
                'gender' => 'Male', // Add gender
                'country' => 'Canada', // Add country
                'phonenumber' => '9988776655', // Add phone number
                'password' => Hash::make('12345678'), // Hashed password
                'department_id' => 1, // Associate with department_id = 1
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the users table
        DB::table('users')->insert($users);
    }
}