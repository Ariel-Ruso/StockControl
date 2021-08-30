<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
//use App\Models\Rol;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    public function crear_usuario(){
        
        $rols= Rol::all();
        return view ('usuarios.crear_usuario', compact ('rols'));
    }

    public function crear_usuario2 (Request $request){
    
    	$request-> validate ([
            'nombre' => 'required',
            'password' => 'required',
            'direccion' => 'required',
            'correo' => 'required',
            // 'rols_id' => 'required',
            
        ]);
      
        $user = new Usuario();
        $user->nombre = $request->nombre;
        $user->password = $request->password;
        $user->direccion = $request->direccion;
        $user->correo = $request->correo;
        // $user->rols_id = $request->rols_id;
        
        $user->save();
        return back()->with('mensaje', 'Usuario agregado correctamente');
        
    }

    public function index (){
       
        $users= User::paginate(5);
        $roles= Role::all();
        $cont= count($users);
        //$rols= Rol::all();
        //dd($roles);
    	return view ('usuarios.index', compact ('users', 'cont', 'roles'));
    }

    public function permisos(){
       
        $users= User::paginate(5);
        //$rols= Rol::all();
    	return view ('usuarios.permisos', compact ('users'));
    }
    
    public function edit ($id){

        $user= User::FindeOrFail($id);
        return view('usuarios.edit', compact('user'));
    }
    
}
