@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

<div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-orange-300 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            Tus Datos Facturacion
                        </span>
                    </div>
                    <div class="card-body">
                    <table class="table">
                            <thead >
                            <tr class=" text-center text-xs leading-4 
                                font-medium text-black-500 uppercase tracking-wider">
                                    <th scope="col">
                                        Operacion
                                    </th>
                                    <th scope="col">
                                        Descripcion
                                    </th>
                                    <th scope="col">
                                        Fecha
                                    </th>
                                    <th scope="col">
                                        Hora:Min
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
                                    <th scope="col">
                                        Facturar
                                    </th>
                                    <th scope="col">
                                        CSV
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($fact as $item)
                                <thead>
                                <tr class="text-center">
                                    <th>
                                         {{  $item->id }}
                                    </th> 
                                    
                                   
                                </tr>
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