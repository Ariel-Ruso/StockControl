<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Models\Factura;
use App\Models\Gasto;
use App\Models\Item;
use App\Models\User;
use App\Models\Caja;
use App\Models\Propietario;
use App\Models\Presupuesto;
use App\Models\FilecsvCae;
use App\Models\Filecsv;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Qr;

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

    public function cierre_cajaPdf(){

        $hoy= today()->format('d/m/y');
        $users= (new User())->getAll();
        $cajai= new Caja();
        $estado= $cajai->estado();
        $todas= Factura::where('created_at','>',today())->get();
        $gastos= Gasto::where('created_at','>',today())->get();
        $subtotal=  $cajai->totalDia();
        $efect=     $cajai->totalDiaEfect();
        $montoIni=  $cajai->montoInicial();
        $tarj= $cajai->totalDiaTarj();
        $total= $montoIni + $tarj + $efect;
        $cajai->montoIni= 0;
        $cajai->users_id= auth()->id();
        $cajai->save();

        $pdf= \PDF::loadView('caja.cierraCajaPdf', compact ('total', 'users', 'todas','tarj', 'gastos',
            'efect', 'montoIni', 'estado'));
        return $pdf->download('cierre_caja' .$hoy .'.pdf', compact ('total', 'users', 'todas','tarj', 'gastos',
            'efect', 'montoIni', 'estado'));
    }
    
    public function detalle_articuloPdf($id)
    {
        $art= Articulo::FindOrFail($id);
            $cates= Categoria::all();
            $proves= Proveedor::all();
            $pdf= \PDF::loadView('articulos.detalle_articuloPdf', compact ('art', 'cates', 'proves'));
            return $pdf->download('detalle_articulo.pdf', compact ('art', 'cates', 'proves'));
    }

    public function imprimirFactPdf($id)
    {
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        //traigo items con mismo id
        $items = Item::whereIn('idFactura', [$id]) ->get();
        //traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        $pro= Propietario::FindorFail($u_prop);        
        $src= 'Storage/'.$pro->id.'/logodet.jpg'; 

        $fecha= $fact->created_at;
        $cae= FilecsvCae::FindorFail($id);
        $cuitEmi= $cae->cuit;
        $nrofact= $cae->nrofact;
        $vtocae= $cae->vtocae;
        $nrocae= $cae->cae;
        $cabe= new Filecsv();
        $moneda= $cabe->getMoneda($id);
        
        $nombreCli= $fact->apellidoyNombre;
        $direccionCli= $fact->domicilioCliente;
        $dniCli= $fact->dnicliente;
        $tipoPago= $fact->tipoPago;

        $iva= $fact->iva;
        $subtotal= $fact->subtotal;
        $total= $fact->total;
        $descripcion= $fact->descripcion;

        //qr
        $qr= new Qr();
        $qr->crearQr($dniCli, $total, $iva , $nrofact, $moneda, $cuitEmi, $fecha);
        $qrData= $qr->getLastQr();
        
        $qrPdf= QrCode::size(100)
                ->generate('https://www.afip.gob.ar/fe/ qr/'.$qrData); 
            
        $pdf= \PDF::loadView('facturas.facturaB_PDF', compact ('fecha', 'nrofact', 'nombreCli', 
            'direccionCli', 'dniCli', 'iva', 'subtotal', 'total', 'id', 'items', 'qrPdf',
             'moneda', 'vtocae', 'nrocae', 'tipoPago', 'pro', 'src'));

        return $pdf->stream('Fc-' .$nombreCli .'.pdf');     
                
    }
    
    public function imprimirFactPdfA($id)
    {
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        //traigo items con mismo id
        $items = Item::whereIn('idFactura', [$id]) ->get();
        //reviso user y traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        
        $pro= Propietario::FindorFail($u_prop);        
        $src= 'Storage/'.$pro->id.'/logodet.jpg'; 

        $fecha= $fact->created_at;
        $cae= FilecsvCae::FindorFail($id);
        $cuitEmi= $cae->cuit;
        $nrofact= $cae->nrofact;
        $vtocae= $cae->vtocae;
        $nrocae= $cae->cae;
        $cabe= new Filecsv();
        $moneda= $cabe->getMoneda($id);
        
        $nombreCli= $fact->apellidoyNombre;
        $direccionCli= $fact->domicilioCliente;
        $dniCli= $fact->dnicliente;
        $tipoPago= $fact->tipoPago;

        $iva= $fact->iva;
        $subtotal= $fact->subtotal;
        $total= $fact->total;
        $descripcion= $fact->descripcion;

        //qr
        $qr= new Qr();
        $qr->crearQr($dniCli, $total, $iva , $nrofact, $moneda, $cuitEmi, $fecha);
        $qrData= $qr->getLastQr();
        
        $qrPdf= QrCode::size(100)
                ->generate('https://www.afip.gob.ar/fe/ qr/'.$qrData); 
            
        $pdf= \PDF::loadView('facturas.facturaA_PDF', compact ('fecha', 'nrofact', 'nombreCli', 
            'direccionCli', 'dniCli', 'iva', 'subtotal', 'total', 'id', 'items', 'qrPdf',
             'moneda', 'vtocae', 'nrocae', 'tipoPago', 'pro', 'src'));

        return $pdf->stream('Fc-' .$nombreCli .'.pdf');     
                
    }

    public function imprimirRemitPdf($id)
    {
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        //traigo items con mismo id
        $items = Item::whereIn('idFactura', [$id]) ->get();

        //reviso user y traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        
        $pro= Propietario::FindorFail($u_prop);        
        $src= 'Storage/'.$pro->id.'/logodet.jpg'; 

        $fecha= $fact->created_at;
        $nremit= "0002-0002318";

        $nombreCli= $fact->apellidoyNombre;
        $direccionCli= $fact->domicilioCliente;
        $dniCli= $fact->dnicliente;
        $tipoPago= $fact->tipoPago;
        
        $total= $fact->total;
        
        $pdf= \PDF::loadView ('remitos.remito_PDF', compact('fecha', 'nremit', 'dniCli', 
                'tipoPago', 'direccionCli', 'total', 'id', 'items', 'nombreCli', 'pro', 'src'));
            
        return $pdf->download ('Rm-' .$nombreCli .'.pdf', compact('fecha', 'nremit', 'dniCli', 
            'direccionCli', 'total', 'id', 'items', 'nombreCli', 'tipoPago', 'pro', 'src'));
                
    }

    public function imprimirRemitPdf2($id)
    {
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        //traigo items con mismo id
        $items = Item::whereIn('idFactura', [$id]) ->get();
        
        //reviso user y traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;

        $pro= Propietario::FindorFail($u_prop);        
        $src= 'Storage/'.$pro->id.'/logodet.jpg'; 

        $fecha= $fact->created_at;
        $nremit= "0002-0002318";

        $nombreCli= $fact->apellidoyNombre;
        $direccionCli= $fact->domicilioCliente;
        $dniCli= $fact->dnicliente;
        $tipoPago= $fact->tipoPago;
        
        $total= $fact->total;
        
        $pdf= \PDF::loadView ('remitos.remito_PDF2', 
                compact('fecha', 'nremit', 'dniCli', 'tipoPago', 'direccionCli',
                         'total', 'id', 'items', 'nombreCli', 'pro', 'src'));
            
        return $pdf->download ('Rm-' .$nombreCli .'.pdf', 
                        compact('fecha', 'nremit', 'dniCli', 'tipoPago', 'direccionCli',
                    'total', 'id', 'items', 'nombreCli', 'pro', 'src'));
                
    }

    public function imprimirPresuPdf($id)
    {
        //traigo presu con id
        $presu= Presupuesto::FindorFail($id);
        //traigo items con mismo id
        $items = Item::whereIn('idPresupuesto', [$id]) ->get();

        //reviso user y traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        
        $pro= Propietario::FindorFail($u_prop);        
        $src= 'Storage/'.$pro->id.'/logodet.jpg'; 

        $fecha= $presu->created_at;
        $npresu= "0003-000400". $id;

        /* $nombreCli= $fact->apellidoyNombre;
        $direccionCli= $fact->domicilioCliente;
        $dniCli= $fact->dnicliente; */
        $tipoPago= $presu->tipoPago;
        
        $total= $presu->total;
        
        $pdf= \PDF::loadView ('presupuestos.presupuesto_PDF', compact('fecha', 'npresu',  
                'tipoPago', 'total', 'id', 'items', 'pro', 'src'));
            
        return $pdf->download ('Presup.pdf', compact('fecha', 'npresu',  
            'total', 'id', 'items', 'tipoPago', 'pro', 'src'));
                
    }
}
