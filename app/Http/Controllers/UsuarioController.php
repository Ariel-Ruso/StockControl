<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Rol;
use Illuminate\Http\Request;

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

    public function mostrarTodos (){
       
        $users= Usuario::paginate(5);
        $rols= Rol::all();
    	return view ('usuarios.mostrarTodos', compact ('users', 'rols'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
