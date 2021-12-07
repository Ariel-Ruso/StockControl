<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // admin all
        //manager ver listado user
        //user ver su user

        $admin= Role::create ([ 'name'=> 'Admin']);
        $manager= Role::create ([ 'name'=> 'Manager']);
        $user= Role::create ([ 'name'=> 'User']);
/* 
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
             */

        Permission::create ([ 'name'=> 'dashboard'])->syncRoles ([$admin, $manager, $user]);
        Permission::create ([ 'name'=> 'clientes.create'])->syncRoles ([$admin]);
        /* 
        Permission::create ([ 'name'=> 'admin.clientes.edit']);
        Permission::create ([ 'name'=> 'admin.clientes.destroy']); */
    }
}
