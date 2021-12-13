@extends('layouts.app')
@section('content')
{{-- 
@component('components.navbar')
@endcomponent --}}

<x-navbar class="btn btn-outline-primary border border-dark shadow font-weight-bold" />                

    <div class="py-5 ">
        <div class="max-w-3xl mx-auto sm:px-2 lg:px-2">
            <div class="bg-blue overflow-hidden shadow-xl border-2 sm:rounded-lg ">
                  <x-tarjeta>
                    <x-slot name="title" >  
                    </x-slot>
                    <x-slot name="cuerpo">
                        <table class= "table ">
                            <tr >
                                <h1>
                                    Control Stock
                                </h1>
                                
                                <th class="text-align:left">
                                    <div name= "info de Caja" class="container  ">
                                    <div class="col-md-8 ">
                                        <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-green-500">
                                                Monto Inicial: 
                                            </span>
                                            <?php
                                                $caja= New App\Models\Caja();
                                                $totDiario= $caja->totalDia();
                                                $montoIni= $caja->montoInicial();
                                                $estado= $caja->estado();
                                                $status= $caja->status($estado);
                                                $totDiario = $totDiario + $montoIni;
                                                ?>
                                                
                                            $ {{ $montoIni }}
                                        </div>
                                    </div>  
                                    <br>
                                    <div class="col-md-12 ">
                                        <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-green-500">
                                                Caja: 
                                            </span>
                                           
                                            {{ $status }}
                                        </div>
                                    </div>  
                                    <br>
                                    <div class="col-md-10 ">
                                        <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-green-500">
                                                Total Diario:
                                                <!-- calculo php inicio caja + totales (ef+tarj)-->
                                            </span>
                                            $ {{ $totDiario }}
                                        </div>
                                    </div> 
                                    <br>
                                    <div class="col-md-10 ">
                                        <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-green-500">
                                                Fecha:
                                            </span>
                                             {{ today()->format('d/m/y') }}
                                        </div>
                                    </div> 

                                </th>
                                <th class="text-align:center">
                                    <div class="container ">
                                        <div class="row justify-content-center mt-5 ">
                                            <div class="container mx-auto ">
                                                <img src="Storage/stock.jpg" height="400" width="300" >
                                            </div>
                                        </div>
                                    </div>

                                </th>
                            </tr>
                            
                        </table>        
                    </x-slot>
                  </x-tarjeta>  
            </div>
        </div>
    </div>
    
@endsection
