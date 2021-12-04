<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create ([
            'name' => 'Ariel',
            'email' => 'ariruso@gmail.com',
            'password' => bcrypt('1234'),
            'id_prop' => 1,

        ]);
        //->assingRole('admin');

        //$user->assingRole('admin');
         
    }
}
//https://www.youtube.com/watch?v=r5Zs9CGB754&ab_channel=CodersFree
