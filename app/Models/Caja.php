<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Caja extends Model
{
    use HasFactory;
    public function user(){
        //caja pertenece a una User
        return $this->belongsTo (User::class); 
    }
}
