<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class userController extends Controller
{
    public function mostrarTodos (){
       
        $users= User::paginate(5);
        $rols= Rol::all();
        
        //dd($arts, $cates);
    	return view ('usuarios.mostrarTodos', compact ('users', 'rols'));
    }

}
