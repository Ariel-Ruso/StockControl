<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use App\Models\Rol;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware();
        
    }
    public function mostrarTodos (){
       
        $users= User::all();
        $roles= Role::all();
        //$rols= Rol::all();
        //dd($users, $rols);
    	return view ('usuarios.mostrarTodos', compact ('users');
        //, 'rols'));
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
