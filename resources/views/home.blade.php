@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                

                    <table class= "table">
                    <tr >
                    <th class="text-align:left">

                    <div name= "info de Caja" class="container  ">
                    <div class="col-md-10 ">
                    <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-red-500">
                        Monto Inicial: 
                    </span>
                    $ {{ $montoIni }}
                    </div>
                    </div>  
                    <br>
                    <div class="col-md-10 ">
                    <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
                        Estado de Caja: 
                    </span>
                    {{ $estado }}
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

                    </th>
                    </tr>
                    </table>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
