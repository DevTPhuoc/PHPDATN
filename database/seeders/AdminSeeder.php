<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'account_name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Mã hóa mật khẩu
            'fullname' => 'Admin User',
            'phone' => 1234567890,
            'address' => '123 Main St',
            'role' => 1,
        ]);
    }
}
