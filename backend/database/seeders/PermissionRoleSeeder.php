<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        foreach ($roles as $role) {
            $role->permissions()->attach(
                $permissions->random(rand(1, $permissions->count()))->pluck('id')->toArray()
            );
        }
    }
}
