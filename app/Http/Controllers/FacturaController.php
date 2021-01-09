<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
   
    public function mostrarTodasFact()
    {
        $fact= Factura::paginate(5);
        return $fact;
    }

    public function mostrarImportacion()
    {
        return view ('importar.csv');
    }

    public function importarCsv(Request $request)
    {
        //$file= $request->file('csv_file');
        //Excel::import(new datosFactura, $file);
        //return back()->with('mensaje', 'Se Importo correctamente');
        
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $csv_data = array_slice($data, 0, 2);
        //dd($csv_data);
        return view('importar.importarCampos', compact('csv_data'));
        
    }

    
    public function procesarCsv(CsvImportRequest $request)
    {
    $path = $request->file('csv_file')->getRealPath();
    $data = array_map('str_getcsv', file($path));

    $csv_data_file = CsvData::create([
        'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
        'csv_header' => $request->has('header'),
        'csv_data' => json_encode($data)
    ]);

    $csv_data = array_slice($data, 0, 2);
    return view('import_fields', compact('csv_data', 'csv_data_file'));
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
