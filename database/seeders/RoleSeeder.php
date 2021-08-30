<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $role1= Role::create ([ 'name'=> 'Admin']);
        $role2= Role::create ([ 'name'=> 'User']);

        Permission::create ([ 'name'=> 'admin.home'])
            ->syncRoles ([ $role1, $role2]);

        Permission::create ([ 'name'=> 'admin.users.index'])
            ->syncRoles ([ $role1, $role2]);
        Permission::create ([ 'name'=> 'admin.users.create'])
            ->syncRoles ([ $role1, $role2]);
        Permission::create ([ 'name'=> 'admin.users.edit'])
            ->syncRoles ([ $role1, $role2]);
        Permission::create ([ 'name'=> 'admin.users.destroy'])
            ->syncRoles ([ $role1, $role2]);

        Permission::create ([ 'name'=> 'admin.clientes.index']);
        Permission::create ([ 'name'=> 'admin.clientes.create']);
        Permission::create ([ 'name'=> 'admin.clientes.edit']);
        Permission::create ([ 'name'=> 'admin.clientes.destroy']);
    }
}
