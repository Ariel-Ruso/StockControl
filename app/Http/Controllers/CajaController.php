<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\User;
use App\Models\Caja;
use App\Models\Gasto;
use App\Models\Pedido;
class CajaController extends Controller
{
    
    public function __construct()
    {
    }

    public function index(){
    
        $caja= new Caja();
        $users= (new User()) ->getAll();       
        $gastos= Gasto::where('created_at','>',today())->get();
        $todas= Factura::where('created_at','>',today())->get();
        $cont= count($todas);
        $totDiario= $caja ->totalDia();
        $montoIni= $caja ->montoInicial();
        $totDiario = $totDiario + $montoIni;
        $estado= $caja->estado();
        $status= $caja->status($estado);
        $pedis= Pedido::all();
        //$cateCelu= Categoria::where('nombre', 'like', 'Celulares')->get();
        
        

        return view ('caja.index', compact('todas', 'users', 'montoIni', 'totDiario', 
                    'status', 'estado', 'gastos', 'cont', 'pedis' ));
    }

    public function store(Request $request){
    
        $request-> validate ([
            'monto' => 'required',
        ]);

        $caja= new Caja();
                
        $caja->users_id= auth()->id();
        $caja->montoIni= $request->monto;
        $caja->estado= 1;
        $montoIni= $caja->montoIni;
        $caja->save();
        

        /* 
        $user= new User();
        $users= $user->getAll();
        
        //$fact= new Factura();
        $todas= Factura::where('created_at','>',today())->get();
        $gastos= Gasto::where('created_at','>',today())->get();
        $totFact= 0;
        $cont= count($todas);
        //$caja->last();
        $estado= $caja->estado();
        $status= $caja->status($estado);
        $totDiario= $caja->totalDia();
        
        return  view ('caja.index', compact('montoIni', 'todas', 'users', 'gastos',
                'totDiario', 'estado', 'status', 'cont'))
                ->with('mensaje', 'Monto inicial establecido');
                 */
        return redirect()->action('App\Http\Controllers\CajaController@index')
                        ->with('mensaje', 'Monto inicial establecido');
    }

    public function create(){
       
        return view('caja.create');
    }

    public function cerrarCaja(){

        $cajai= new Caja();
        $users= (new User())->getAll();
        $todas= Factura::where('created_at','>',today())->get();
        $gastos= Gasto::where('created_at','>',today())->get();
        $estado=    $cajai->estado();
        //tot ventas tarj + eft 121
        $subtotal=  $cajai->totalDia();
        //tot ef 121- 200 
        $efect=     $cajai->totalDiaEfect();
        $montoIni=  $cajai->montoInicial();

        $tarj= $cajai->totalDiaTarj();
        $total= $montoIni + $tarj + $efect;
        $cajai->montoIni= $montoIni;
        
        $cajai->montoFin= $total;
        $cajai->totEfect= $efect;
        $cajai->totTarj= $tarj;
        $cajai->users_id= auth()->id();
        $cajai->estado= 0;
        $cajai->save();

        $estado= $cajai->estado();
    
        return view ('caja.cierraCaja', compact('total', 'users', 'todas','tarj', 'efect',
                 'montoIni', 'estado', 'gastos'));

    }
   
}
