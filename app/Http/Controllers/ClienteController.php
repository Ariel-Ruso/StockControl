<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        if(!session()->has('cliente')) session()->put('cliente', array());
    }

    public function index()
    {
        $clie= Cliente::paginate(15);
                
        return view ('clientes.index', compact('clie'));
    }

    public function search(Request $request){

        $nombre= $request->get('nombre');
        $dni= $request->get('dni');
        
        $clie= Cliente::orderBy ('dni', 'DESC')
            ->dni ($dni)
            ->nombre ($nombre)
            ->paginate (15);

        $cont= count($clie);
        
        return view ('clientes.index', compact ('clie', 'cont'));
    }

    public function create(){

        return view ('clientes.create');
    }

    public function store (Request $request){
        
    	$request-> validate ([
            'nombre' => 'required',
            'direccion'=> 'required',
            'cuit' => 'required',
            'dni' => ['required', 'unique:clientes'],
            'email' =>  'required', 
            'telefono' => 'required',
        ]);

        $cliente= Cliente::create($request->all());
        $clie= Cliente::paginate(15);
        $cont= count($clie);
        
        return view ('clientes.index', compact('clie', 'cont'))
                ->with('mensaje', 'Cliente agregado  ');;
        //return back()->with('mensaje', 'Cliente agregado  ');
        
    }

    public function destroy($id)
    {
        $clie= Cliente::FindOrFail($id);
        $clie->delete();
        return back()->with('mensaje', 'Cliente eliminado  ');    
    }

    public function select($id){
        
            session(['
                cliente_id' => $id
                ]);
            session()->put ('cliente_id', $id);
            
            return back()->with ('mensaje', 'Cliente seleccionado');
        
    }

    public function unselect(){

        session()->forget('cliente_id');
        return back();

    }

    public function edit($id)
    {
        $clie= Cliente::FindOrFail($id);

        return view ('clientes.edit', compact('clie'));
        
    }

    public function update($id, Request $request ){
            
        $clie= Cliente::FindOrFail($id);                
        $clie->update ($request->all());
        
        return back()->with('mensaje', 'Cliente editado  ');
    }
    
    public function verCliente()
    {
        dd( session()->get('cliente_id'));       
    }
}
