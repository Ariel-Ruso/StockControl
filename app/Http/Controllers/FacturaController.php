<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Filecsv;
use App\Models\FilecsvIva;
use App\Models\FilecsvCae;
use App\Models\Cliente;
use DB;
use App\Models\Qr;
use App\Models\Propietario;
use App\Models\Numero;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class FacturaController extends Controller
{
   
    public function mostrarTodasFact()
    {
        $fact= Factura::all();
        return $fact;
    }

    public function procesarCsv(CsvImportRequest $request){

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

    public function imprimirFactB($id){
    
        //solo imprime si cabe-iva-cae-fact tiene id correlativo
        $cabe= new Filecsv();
        $moneda= $cabe->getMoneda($id);
        
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        $cantFact= $fact->contarFact();
        
        //traigo items d esa fact
        $items = Item::whereIn('idFactura', [$id]) ->get();
        //traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        
        $pro= Propietario::FindorFail($u_prop);

        $cae= FilecsvCae::FindorFail($id);

        /* if ($cae == null){
            //sino hay cae con ese id
            $caeN= new FilecsvCae();
            $cantCaes= $caeN->contarCaes();
            //comparo cant d caes y facturas, aunque id no sea correlativo
            if($cantCaes == $cantFact ){
                //dd($cantCaes, $cantFact);
                $cae= $caeN->getLastCae();

            }
        } */

        if(isset ($cae)){
            $cuitEmi= $cae->cuit;
            $nrofact= $cae->nrofact;
            $vtocae= $cae->vtocae;
            $nrocae= $cae->cae;
            $fecha= $fact->created_at;
            
            $nombreCli= $fact->apellidoyNombre;
            $direccionCli= $fact->domicilioCliente;
            $dniCli= $fact->dnicliente;
            $tipoPago= $fact->tipoPago;

            $iva= $fact->iva;
            $subtotal= $fact->subtotal;
            $total= $fact->total;
            $descripcion= $fact->descripcion;
                        
            $qr= new Qr();
            $qr->crearQr( $dniCli, $total, $iva , $nrofact, $moneda, $cuitEmi, $fecha);
            $qrData= $qr->getLastQr();
            
            QrCode::size(150)
                ->generate($qrData);  

            return view ('facturas.facturaB', compact('fecha', 'nrofact', 'nombreCli', 'tipoPago',
                    'direccionCli', 'dniCli', 'iva', 'subtotal', 'total', 'pro',
                     'id', 'items', 'qrData', 'vtocae', 'nrocae'));
        
        }elseif ($cae == null){

            return back()->with('mensaje','revise los ids');
        }
        
    }

    public function imprimirFactA($id){
    
        //solo imprime si cabe-iva-cae-fact tiene id correlativo
        $cabe= new Filecsv();
        $moneda= $cabe->getMoneda($id);
        
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        $cantFact= $fact->contarFact();
        
        //traigo items d esa fact
        $items = Item::whereIn('idFactura', [$id]) ->get();
        
        //reviso user y traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        $pro= Propietario::FindorFail($u_prop);

        $cae= FilecsvCae::FindorFail($id);

        /* if ($cae == null){
            //sino hay cae con ese id
            $caeN= new FilecsvCae();
            $cantCaes= $caeN->contarCaes();
            //comparo cant d caes y facturas, aunque id no sea correlativo
            if($cantCaes == $cantFact ){
                //dd($cantCaes, $cantFact);
                $cae= $caeN->getLastCae();

            }
        } */

        if(isset ($cae)){
            $cuitEmi= $cae->cuit;
            $nrofact= $cae->nrofact;
            $vtocae= $cae->vtocae;
            $nrocae= $cae->cae;
            $fecha= $fact->created_at;
            
            $nombreCli= $fact->apellidoyNombre;
            $direccionCli= $fact->domicilioCliente;
            $dniCli= $fact->dnicliente;
            $tipoPago= $fact->tipoPago;

            $iva= $fact->iva;
            $subtotal= $fact->subtotal;
            $total= $fact->total;
            $descripcion= $fact->descripcion;
                        
            $qr= new Qr();
            $qr->crearQr( $dniCli, $total, $iva , $nrofact, $moneda, $cuitEmi, $fecha);
            $qrData= $qr->getLastQr();
            
            QrCode::size(150)
                ->generate($qrData);  

            return view ('facturas.facturaA', compact('fecha', 'nrofact', 'nombreCli', 'tipoPago',
                    'direccionCli', 'dniCli', 'iva', 'subtotal', 'total', 'pro',
                     'id', 'items', 'qrData', 'vtocae', 'nrocae'));
        
        }elseif ($cae == null){

            return back()->with('mensaje','revise los ids');
        }
        
    }

    public function imprimirRemit($id)
    {
        //traigo unica fact con id
        $fact= Factura::FindorFail($id);
        $eft=0;
        $tBanc=0;
        $tnoBanc=0;
        if( $fact->tipoPago == 1){
            $eft= $fact->total;

        }elseif($fact->tipoPago == 2){
            $eft= $fact->total;

        }elseif( ($fact->tipoPago == 31) || ($fact->tipoPago == 32) ||
            ($fact->tipoPago == 33) || ($fact->tipoPago == 34) ){
            $tBanc= $fact->total;

        }elseif($fact->tipoPago == 4){
            $tnoBanc= $fact->total;

        }elseif( ($fact->tipoPago == 5) || ($fact->tipoPago == 51) 
                || ($fact->tipoPago == 52) || ($fact->tipoPago == 53) 
                || ($fact->tipoPago == 54) ){
            $eft= $fact->totalEft;
            $tnoBanc= $fact->totalNoBanc;
            $tBanc= $fact->totalCuot;
        }

        //traigo items con mismo id
        //<<<<<<< HEAD
        $desc=0;
        $items = Item::whereIn('idFactura', [$id]) ->get();
        //dd($items[0]);
        for ($i=0; $i<count($items); $i++) {
            $desc= $desc + $items[$i]->descuento;
            
        }
        //dd($desc);
        /* =======
        $items = Item::whereIn('idFactura', [$id])
                 ->get();
        /* $num= Numero::whereIn('id', $items->numero )
                ->get();
                dd($num); */
  
        //>>>>>>> calzados */
        $nums= Numero::all();
        //reviso user y traigo datos d propiet
        $u_id= auth()->id();  
        $user= User::FindorFail($u_id);
        $u_prop= $user->id_prop;
        
        $pro= Propietario::FindorFail($u_prop);
        $fecha= $fact->created_at;
        $nremit= "0002-00023". $id;
       
        $clie= Cliente::FindorFail($fact->clie_id);

        // $nombreCli= $fact->apellidoyNombre;
        // $direccionCli= $fact->domicilioCliente;
        // $dniCli= $fact->dnicliente;
        
        $tipoPago= $fact->tipoPago;

        $total= $fact->total;
        $subtotal= $fact->subtotal;
        $iva= $fact->iva;
        //dd($clie);
        
        return view ('remitos.remito', compact('fecha', 'nremit',  'iva', 'subtotal', 'clie',
                    //'direccionCli', 'nombreCli', 'dniCli', 
                    'total', 'id', 'items',  'tipoPago', 'pro', 'desc', 'nums',
                    'eft','tBanc', 'tnoBanc'));

    }

    public function generarFacturaB($id){
        
        //dd($id);
        $fact= new Factura();
        $fact= Factura::FindorFail($id);
      
        
        $cabe= new Filecsv();
        
        //$cabe->crearCsv($fact->dnicliente, $fact->total, $fact->iva);
        
        $cabe->escribirCabe($id);
        $moneda= $cabe->getMoneda($id);

        $Eiva= new FilecsvIva();
        $Eiva->escribirIva($id);

        /* //llamo any2fe revisar modo silencioso
        - Modo silencioso: “S” para que no aparezcan mensajes en pantalla, 
        cualquier otro valor muestra en
        pantalla los mensajes de avance de la tarea */

        //shell_exec('autoriza');
        
        $ncae= new FilecsvCae();
        $res= $ncae->existeCae();
                                       
        //si existe any2cae continuo
        if($res == 1){
            
            //$this->imprimirFact($id);

            //imprimo factura
           
            $items = Item::whereIn('idFactura', [$id]) ->get();
            //traigo datos d propiet
            $u_id= auth()->id();  
            $user= User::FindorFail($u_id);
            $u_prop= $user->id_prop;
            
            $pro= Propietario::FindorFail($u_prop);            
            $ncae->importarCaeCsv();
            $ncae->chekId($id);
            $cae= FilecsvCae::FindorFail($id);

            //$cae= $ncae:->getLastCae();
            
            //if(isset ($cae)){   

                $cuitEmi= $cae->cuit;
                $nrofact= $cae->nrofact;
                $fact->tipoCte= "B";
                $fact->numfact= $cae->nrofact;
                $fact->save ();
                
                $vtocae= $cae->vtocae;
                $nrocae= $cae->cae;

                $fecha= $fact->created_at;
                $nombreCli= $fact->apellidoyNombre;
                $direccionCli= $fact->domicilioCliente;
                $dniCli= $fact->dnicliente;
                $tipoPago= $fact->tipoPago;

                $iva= $fact->iva;
                $subtotal= $fact->subtotal;
                $total= $fact->total;
                $descripcion= $fact->descripcion;
                
                //genero qr
                $qr= new Qr();
                $qr->crearQr( $dniCli, $total, $iva , $nrofact, $moneda, $cuitEmi, $fecha);
                $qrData= $qr->getLastQr();
                
                QrCode::size(150)
                    ->generate($qrData);  

                return view ('facturas.facturaB', compact('fecha', 'nrofact', 'nombreCli', 
                    'direccionCli', 'dniCli', 'iva', 'subtotal', 'total', 'tipoPago',
                     'id', 'items', 'qrData', 'vtocae', 'nrocae', 'pro'));
            //}

        }elseif ($res == 0){

            return back()->with('mensaje', 'No hay nuevo CAE, intente nuevamente.');
        }
         
    } 

    public function generarFacturaA($id){
        
        $fact= new Factura();
        $fact= Factura::FindorFail($id);

        $cabe= new Filecsv();
        $cabe->crearCsvA($fact->cuitcliente, $fact->total, $fact->iva);
        $cabe->escribirCabe($id);
        $moneda= $cabe->getMoneda($id);

        /* $listab = DB::select('select codigo, gravado, impuesto from filecsv_ivas 
            where id = ?', [$id]);
            
            $fp2 = fopen('any2iva.csv', 'w');
            
            foreach ($listab as $camposb) {
                fputcsv($fp2,(array) $camposb);
            }
            fwrite($fp2,chr(10).chr(13));
            fclose($fp2); */
         
        $Eiva= new FilecsvIva();

        $Eiva->escribirIva($id);

        /* //llamo any2fe revisar modo silencioso
        - Modo silencioso: “S” para que no aparezcan mensajes en pantalla, 
        cualquier otro valor muestra en
        pantalla los mensajes de avance de la tarea */
        //shell_exec('autoriza');
        
        $ncae= new FilecsvCae();
        $res= $ncae->existeCae();
                                       
        //si existe any2cae continuo
        if($res == 1){
            //$this->imprimirFact($id);

            //imprimo factura
            
            $items = Item::whereIn('idFactura', [$id]) ->get();
            $pro= Propietario::FindorFail('2');
            $ncae->importarCaeCsv();
            $ncae->chekId($id);
            $cae= FilecsvCae::FindorFail($id);

            //$cae= $ncae:->getLastCae();
            
            //if(isset ($cae)){   

                $cuitEmi= $cae->cuit;
                $nrofact= $cae->nrofact;
                $fact->tipoCte= "A";
                $fact->numfact= $cae->nrofact;
                $fact->save ();
                
                $vtocae= $cae->vtocae;
                $nrocae= $cae->cae;

                $fecha= $fact->created_at;
                $nombreCli= $fact->apellidoyNombre;
                $direccionCli= $fact->domicilioCliente;
                $dniCli= $fact->dnicliente;
                $tipoPago= $fact->tipoPago;

                $iva= $fact->iva;
                $subtotal= $fact->subtotal;
                $total= $fact->total;
                $descripcion= $fact->descripcion;
                
                //genero qr
                $qr= new Qr();
                $qr->crearQr( $dniCli, $total, $iva , $nrofact, $moneda, $cuitEmi, $fecha);
                $qrData= $qr->getLastQr();
                
                QrCode::size(150)
                    ->generate($qrData);  

                return view ('facturas.facturaA', compact('fecha', 'nrofact', 'nombreCli', 
                    'direccionCli', 'dniCli', 'iva', 'subtotal', 'total', 'tipoPago',
                     'id', 'items', 'qrData', 'vtocae', 'nrocae', 'pro'));
            //}

        }elseif ($res == 0){

            return back()->with('mensaje', 'No hay nuevo CAE, intente nuevamente.');
        }
         
    } 
}
    
