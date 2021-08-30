<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caja;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        
        
        return view('home');
    }

    public function index2()
    {
        $caja= new Caja();
        $totDiario= $caja->totalDia();
        $montoIni= $caja->montoInicial();
        $totDiario = $totDiario + $montoIni;
        $estado= $caja->estado();
        $status= $caja->status($estado);
        
        return view('dashboard', compact('totDiario', 'montoIni',  'status'));
    }


}
