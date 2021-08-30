<?php

namespace App\Http\Controllers;

use App\Models\FilecsvCae;
use App\Imports\csvImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FilecsvCaeController extends Controller
{
    
    public function importarCae(Request $request)
    {
        $file= $request->file('csv_file');
        Excel::import(new csvImport, $file);
        return back()->with('mensaje', 'Importacion Cae Correcta');      
                
    }

    public function importarCaeCsv()
    {
        $file = fopen('any2cae.csv', 'r');
        //$file= file('any2cae.csv');
        dd($file);
        Excel::import(new csvImport, $file);
        //return back()->with('mensaje', 'Importacion Cae Correcta');      
                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imprimirFactPDF()
    {
        $cae= FilecsvCae::all();
        return view ('importar.importarCampos', compact ('cae'));
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
     * @param  \App\Models\FilecsvCae  $filecsvCae
     * @return \Illuminate\Http\Response
     */
    public function show(FilecsvCae $filecsvCae)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FilecsvCae  $filecsvCae
     * @return \Illuminate\Http\Response
     */
    public function edit(FilecsvCae $filecsvCae)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FilecsvCae  $filecsvCae
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FilecsvCae $filecsvCae)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FilecsvCae  $filecsvCae
     * @return \Illuminate\Http\Response
     */
    public function destroy(FilecsvCae $filecsvCae)
    {
        //
    }
}
