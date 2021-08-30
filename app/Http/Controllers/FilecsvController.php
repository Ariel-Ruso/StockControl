<?php

namespace App\Http\Controllers;

use App\Models\Filecsv;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FilecsvExport;

class FilecsvController extends Controller
{
     public function exportarCsv($id)
    {
        return (new FilecsvExport)
            ->forId($id)
            ->download('any2cabe.csv');
    }
 
    public function mostrarImportacion()
    {
        return view ('importar.csv');
    }

    public function importarCsv(Request $request)
    {
        //$file= $request->file('csv_file');
        //Excel::import(new datosFactura, $file);
        //return back()->with('mensaje', 'Se Importo  ');
        
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $csv_data = array_slice($data, 0, 2);
        //dd($csv_data);
        return view('importar.importarCampos', compact('csv_data'));
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filecsv  $filecsv
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filecsv  $filecsv
     * @return \Illuminate\Http\Response
     */
    public function edit(Filecsv $filecsv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Filecsv  $filecsv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filecsv $filecsv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filecsv  $filecsv
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filecsv $filecsv)
    {
        //
    }
}
