<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea 1 manager
        $managerData = [
            'name' => 'Francesco Manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
        ];

        $manager = User::create($managerData);
        $manager->assignRole('manager');

        $this->command->info("Manager creato: {$manager->name} ({$manager->email})");
    }
}
