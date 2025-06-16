<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea 5 employee
        $employees = [
            [
                'name' => 'Mario Rossi',
                'email' => 'mario.rossi@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Giulia Bianchi',
                'email' => 'giulia.bianchi@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Luca Verdi',
                'email' => 'luca.verdi@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Sara Neri',
                'email' => 'sara.neri@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Andrea Ferrari',
                'email' => 'andrea.ferrari@example.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($employees as $employeeData) {
            $user = User::create($employeeData);
            $user->assignRole('employee');

            $this->command->info("Employee creato: {$user->name} ({$user->email})");
        }
    }
}