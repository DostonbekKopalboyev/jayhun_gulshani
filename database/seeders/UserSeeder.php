<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password')

        ]);
        $manager = User::create([
            'name'=>'manager',
            'email'=>'manager@gmail.com',
            'password'=>bcrypt('password')

        ]);
        $admin->assignRole('admin');
        $manager->assignRole('manager');
    }
}
