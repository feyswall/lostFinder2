<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'superRole']);

        $permissions = Permission::insert([
            ['name' => 'edit user', 'guard_name' => 'web'],
            ['name' => 'add user' , 'guard_name' => 'web'],
            ['name' => 'delete user', 'guard_name' => 'web'],
            ['name' => 'update user', 'guard_name' => 'web']
        ]);
        // sync permissions to super role
        $role->syncPermissions($permissions);
    }
}
