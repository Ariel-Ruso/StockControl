<?php

namespace App\Http\Controllers;

use App\Models\Traza;
use Illuminate\Http\Request;

class TrazaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Trabajos()
    {
        return view('traza.trabajos');
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
     * @param  \App\Models\Traza  $traza
     * @return \Illuminate\Http\Response
     */
    public function show(Traza $traza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traza  $traza
     * @return \Illuminate\Http\Response
     */
    public function edit(Traza $traza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traza  $traza
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Traza $traza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traza  $traza
     * @return \Illuminate\Http\Response
     */
    public function destroy(Traza $traza)
    {
        //
    }
}
