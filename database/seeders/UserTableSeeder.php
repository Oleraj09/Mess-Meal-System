<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'status' => 'in'
            ],
            //Member
            [
                'name' => 'Member',
                'username' => 'member',
                'email' => 'member@gmail.com',
                'password' => Hash::make('member'),
                'role' => 'member',
                'status' => 'in'
            ],
            //Manager
            [
                'name' => 'Manager',
                'username' => 'manager',
                'email' => 'manager@gmail.com',
                'password' => Hash::make('manager'),
                'role' => 'manager',
                'status' => 'in'
            ]
        ]);
    }
}
