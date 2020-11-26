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
    	return view ('usuarios.mostrarTodos', compact ('users', 'rols'));
    }

    public function crear_user(){

        $rols= Rol::all();

        return view ('usuarios.crear_user', compact ( 'rols'));

    }
    
    public function crear_user2 (Request $request){
        
    	$request-> validate ([
            'nombre' => 'required',
            'correo' => 'required',
            'direccion' => 'required',
        ]);
      
        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->address = $request->direccion;
        $user->rol = $request->rol;
        $user->save();
        return back()->with('mensaje', 'Usuario agregado correctamente');
        
    }

}
