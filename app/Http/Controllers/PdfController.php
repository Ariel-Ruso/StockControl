<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;

class PdfController extends Controller
{
    
    public function articulosPdf()
    {
        $arts= Articulo::all();
        $cates= Categoria::all();
        $proves= Proveedor::all();
        $pdf= \PDF::loadView('articulos.articulosPdf', compact ('arts', 'cates', 'proves'));
        return $pdf->download('articulosPdf.pdf', compact ('arts', 'cates', 'proves'));
    }

    public function articulosPdfHoriz()
    {
        $arts= Articulo::all();
        $cates= Categoria::all();
        $proves= Proveedor::all();
        $pdf= \PDF::loadView('articulos.articulosPdfHoriz', compact ('arts', 'cates', 'proves'));
        return $pdf->setPaper('a4', 'landscape')->stream('articulosPdfHoriz.pdf', 
                compact ('arts', 'cates', 'proves'));
    }
    
    public function detalle_articuloPdf($id)
    {
        $art= Articulo::FindOrFail($id);
            $cates= Categoria::all();
            $proves= Proveedor::all();
            $pdf= \PDF::loadView('articulos.detalle_articuloPdf', compact ('art', 'cates', 'proves'));
            return $pdf->download('detalle_articulo.pdf', compact ('art', 'cates', 'proves'));
    }
}
