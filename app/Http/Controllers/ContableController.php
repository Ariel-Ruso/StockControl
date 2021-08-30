<?php

namespace App\Http\Controllers;

use App\Models\Contable;
use App\Models\User;
use App\Models\Factura;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContableController extends Controller
{
    public function buscaContable(Request $request){

        $user= new User();
        $users= $user->getAll();
        
        $nombre= $request->get('nombre');
        $dni= $request->get('dni');
        $fechai= $request->get('fechai');
        $fechaf= $request->get('fechaf');
        $precioi= $request->get('precioi');
        $preciof= $request->get('preciof');
        
        $facts= Factura::orderBy ('id', 'ASC')
            ->nombre ($nombre)
            ->dni ($dni)
            ->fechai($fechai)
            ->fechaf($fechaf)
            ->precioi ($precioi)
            ->preciof ($preciof)

            ->paginate (15);

        $cont= count($facts);

        return view ('contable.index', compact ('facts','cont', 'users'));
    }

    public function index()
    {
        $user= new User();
        $users= $user->getAll();
        $fact= new Factura();
        $facts= $fact->mostrarTodasFact();
        $cont= count($facts);
        
        return view ('contable.index', compact('facts', 'cont', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Contable  $contable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fact= Factura::FindorFail($id);
        $items = Item::whereIn('idFactura', [$id]) ->get();

        return view ('contable.show', compact('fact','items'));

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contable  $contable
     * @return \Illuminate\Http\Response
     */
    public function edit(Contable $contable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contable  $contable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contable $contable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contable  $contable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contable $contable)
    {
        //
    }
}
