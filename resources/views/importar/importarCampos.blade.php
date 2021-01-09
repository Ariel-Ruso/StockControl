@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent
<!-- 
nroreg:	numérico, entero, valor fijo “1”
ptovta:	numérico, entero
tipocomp:	numérico, entero
concepto:	numérico, entero
fechacomp:	alfanumérico, formato aaaammdd
fechavto:	idem anterior
fechadesde:	idem anterior
fechahasta:	idemanterior
cuit:		numerico, entero
tipodoc:	numerico, entero
gravado:	numérico, doble precisión
nogravado:	idem anterior
exento:	idem anterior
total:	idem anterior
moneda:	alfanumérico
tipocambio:	numérico, doble precisión
cantcomp:	numérico, entero, valor fijo “1”
 -->
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

                @foreach ($csv_data as $row )
                        <table class="table table-bordered border-blue-500 border-opacity-100">
                            <thead >
                                <tr>
                                    <th>
                                        nroreg
                                    </th>
                                    <th>
                                        ptovta
                                    </th>
                                    <th>
                                        tipocomp
                                    </th>
                                    <th>
                                        concepto
                                    </th> 
                                </tr>
                            </thead>
                            <!-- @foreach (session('carrito') as $id => $detalle) -->
                            <tr>
                                @foreach ($row as $key => $value)
                        
                        <!-- recorro array  -->
                            <tr>
                                
                                <td>{{ $value }}</td>
                                
                                @endforeach
                            </tr>
                            @endforeach

                            @foreach ($csv_data[0] as $key => $value)
                <td>
                <td>{{ $value }}</td>   
                   
                </td>
            @endforeach
                    </table>
                                    
                        </div>
                    </div>                   
            </div>
        </div>
    </div>

<!-- 
<form class="form-horizontal" method="POST" action="">
    @csrf

    <table class="table">
        @foreach ($csv_data as $row)
            <tr>
            @foreach ($row as $key => $value)
                <td>{{ $value }}</td>
            @endforeach
            </tr>
        @endforeach
        
        <tr>
            @foreach ($csv_data[0] as $key => $value)
                <td>
                     <select name="fields[{{ $key }}]">
                        @foreach (config('app.db_fields') as $db_field)
                            <option value="{{ $loop->index }}">{{ $db_field }}</option>
                        @endforeach
                    </select> 
                   
                </td>
            @endforeach
        </tr> 
    </table>
 
    <button type="submit" class="btn btn-primary">
        Import Data
    </button>
</form>-->