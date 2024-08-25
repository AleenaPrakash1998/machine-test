<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesAndPermissionsSeeder extends Seeder
{

    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'create leads']);
        Permission::create(['name' => 'create proposals']);
        Permission::create(['name' => 'create estimates']);
        Permission::create(['name' => 'create invoices']);
        Permission::create(['name' => 'manage all']);

        // Create roles and assign created permissions

        // Sales role
        $role = Role::create(['name' => 'sales']);
        $role->givePermissionTo('create leads');
        $role->givePermissionTo('create proposals');

        // Estimator role
        $role = Role::create(['name' => 'estimator']);
        $role->givePermissionTo('create estimates');

        // Billing role
        $role = Role::create(['name' => 'billing']);
        $role->givePermissionTo('create invoices');

        // Manager role
        $role = Role::create(['name' => 'manager']);
        $role->givePermissionTo(Permission::all());
    }
}
