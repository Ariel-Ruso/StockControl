<?php

namespace App\Http\Controllers;

use App\Models\FilecsvIva;
use Illuminate\Http\Request;
use App\Exports\FilecsvIvaExport;
use Maatwebsite\Excel\Facades\Excel;

class FilecsvIvaController extends Controller
{
    public function exportarCsvIva($id)
    {
        return (new FilecsvIvaExport)->forId($id)->download('any2iva.csv');
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
     * @param  \App\Models\FilecsvIva  $filecsvIva
     * @return \Illuminate\Http\Response
     */
    public function show(FilecsvIva $filecsvIva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilecsvIva  $filecsvIva
     * @return \Illuminate\Http\Response
     */
    public function edit(FilecsvIva $filecsvIva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilecsvIva  $filecsvIva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilecsvIva $filecsvIva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilecsvIva  $filecsvIva
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilecsvIva $filecsvIva)
    {
        //
    }
}
