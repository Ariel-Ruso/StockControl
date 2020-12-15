@extends('layouts.app')

@section('content')

        <div class="container col-md-6 ">
            <div class="row justify-content-center ">
                    <div class="container mx-auto ">
                        <img src="Storage/cajas.png" height="700" width="600" >
                    </div>
            </div>      
        </div>      
    
   
@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent
    
    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-10">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-green-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Facturacion por Dia
                        </span>             
                    </div>
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Descripcion
                                    </th>
                                    <th scope="col">
                                        Fecha
                                    </th>
                                    <th scope="col">
                                        Vendedor
                                    </th>
                                    <th scope="col">
                                        Efectivo  
                                    </th>
                                    <th scope="col">
                                        Tarjetas
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($todas as $item)
                                <thead>
                                    <th>
                                        $ {{  $item->descripcion }}
                                    </th> 
                                    <th>
                                         {{  $item->created_at->format('d M Y') }}<br>
                                    </th>
                                    <th>
                                         {{  $users[ ($item->users_id)-1]->name }}
                                    </th>
                                    <th>
                                        @if($item->tipoPago==1)
                                            $ {{  $item->total }}
                                        @endif
                                    </th>
                                    <th>
                                        @if($item->tipoPago!=1)
                                            $ {{  $item->total }}
                                        @endif
                                    </th>
                                </thead>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
@endsection