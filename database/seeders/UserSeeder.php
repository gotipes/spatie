<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name'=> 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('superadmin')
        ]);
        $admin->assignRole('superadmin');

        $admin = User::create([
            'name'=> 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $admin->assignRole('admin');

        $client = User::create([
            'name'=> 'Client',
            'email' => 'client@gmail.com',
            'password' => bcrypt('client')
        ]);
        $client->assignRole('client');
    }
}
