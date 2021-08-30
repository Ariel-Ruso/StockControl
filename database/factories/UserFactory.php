<?php

namespace Database\Factories;

use App\Models\User;
//use App\Models\Rol;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
         /*  return [
            //'name' => $this->faker->name,
            'name' => 'User',
            //'email' => $this->faker->safeEmail,
            'email' =>'user@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            
        ];  

        
        $user = new User();
        $user->name = 'Ariel';
        $user->email = 'ariruso@gmail.com';
        $user->password = bcrypt('1234');
        $user->save(); 
        $user->assingRole('Admin');
         
/* 
         User::create ([
            'name' => 'Ariel',
            'email' => 'ariruso@gmail.com',
            'password' => bcrypt('1234')

         ])->assingRole('Admin');
          */
    }
}
