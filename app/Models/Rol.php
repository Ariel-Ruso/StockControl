<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function users()
    {
        return $this->belongsToMany( User::class, 'rol_user', 'users_id', 'rols_id')
                ->withPivot(['name']);
    }
}
