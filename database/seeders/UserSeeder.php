<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Blue-Laundry',
            'email' => 'admin@blue-laundry.com',
            'phone' => '081234567890',
            'address' => 'Jl. Sudirman No. 1, Jakarta',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Demo Customers
        $customers = [
            ['name' => 'Budi Santoso', 'email' => 'budi@gmail.com', 'phone' => '081234567891'],
            ['name' => 'Ani Wijaya', 'email' => 'ani@gmail.com', 'phone' => '081234567892'],
            ['name' => 'Citra Lestari', 'email' => 'citra@gmail.com', 'phone' => '081234567893'],
        ];

        foreach ($customers as $customer) {
            User::create([
                ...$customer,
                'address' => 'Jl. Mawar No. ' . rand(1, 50) . ', Jakarta',
                'password' => Hash::make('password'),
                'role' => 'customer',
            ]);
        }
    }
}