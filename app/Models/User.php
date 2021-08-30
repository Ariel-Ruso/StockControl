<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

   /*  public function rols()
    {
        return $this->belongsToMany(Rol::class, 'rol_user', 'rols_id', 'users_id' )
                    ->withPivot(['nombre', 'descripcion']);
    }  */

    /* public function rols()
    {
        return $this->belongsTo(Rol::class);
                    
    } */
   /*  
    public function getRols($user){

        return ();
    } */
    /* public function authorizeRoles($roles){

        abort_unless($this->hasAnyRol($roles), 401);
        return true;
    }

    public function hasAnyRole($roles){

        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true; 
            }   
        }
        return false;
    }

    public function hasRole($role){

        if ($this->roles()->where('nombre', $role)->first()) {
            return true;
        }
        return false;
    } */

    public function getAll(){

        $users= User::all();
        //dd($users);
        return ($users);
    }
    /* 

    public function getProp($id){
        
        $user= UserFindorFail($id);
        dd($user->id_prop);
        return ();
    } */

    
}
