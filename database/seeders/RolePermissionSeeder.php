<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create(['name' => 'superadmin', 'guard_name' => 'web']);
        $admin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $client = Role::create(['name' => 'client', 'guard_name' => 'web']);

        $admin_read = Permission::create(['name' => 'admin_read']);
        $admin_create = Permission::create(['name' => 'admin_create']);
        $admin_delete = Permission::create(['name' => 'admin_delete']);        

        $client_read = Permission::create(['name' => 'client_read']);
        $client_create = Permission::create(['name' => 'client_create']);
        $client_delete = Permission::create(['name' => 'client_delete']);

        $client_update = Permission::create(['name' => 'client_update']);

        $superadmin->givePermissionTo([$admin_read, $admin_create, $admin_delete, $client_read, $client_create, $client_delete]);
        $admin->givePermissionTo([$client_read, $client_create, $client_delete]);
        $client->givePermissionTo([$client_read, $client_update]);
    }
}
