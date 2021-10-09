@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
</div>
<x-grafica img="Storage/caja.png"/>
  <br>

<table class= "table">
    <tr >
        {{-- col izq --}}
        <th class="text-align:left ">
            <div name= "info de Caja" class="container  ">
            <div class="col-md-10 ml-5">
                <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                    <span class="mt-1 bg-clip-text text-transparent bg-gradient-to-r 
                                from-teal-400 to-green-500">
                        Monto Inicial: 
                    </span>
                    $ {{ $montoIni }}
                </div>
            </div>  
            <br>
            <div class="col-md-10 ml-5 ">
                <div class="text-left text-1xl font-extrabold leading-none tracking-tight">
                    <span class=" mt-1 bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-green-500">
                        Caja: 
                    </span>
                    {{ $status }}
                </div>
            </div>  
            <br>
            <div class="col-md-10 ml-5">
                <div class=" text-left text-1xl font-extrabold leading-none tracking-tight">
                    <span class=" mt-1 bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-green-500">
                        Total Diario:
                        <!-- calculo php inicio caja + totales (ef+tarj) - gastos -->
                    </span>
                    $ {{ $totDiario }}
                </div>
            </div> 
            <br>
            <div class="col-md-10 ml-5">
                <div class=" text-left text-1xl font-extrabold leading-none tracking-tight">
                    <span class="mt-1 bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-green-500">
                        Fecha:
                    </span>
                     {{ today()->format('d/m/y') }}
                </div>
            </div> 

        </th>
        <th class= "container col-5" >
        </th>
        {{-- col der --}}
        
        <th class="text-align:right ">
                
             <div class="container   " name="Add">
                <div name="Movim Cajas" 
                    {{-- class="container mt-4 float " --}}
                    >
                        @if( $estado == 1 )
                            <br>  
                            <a  
                            class= "border-solid border-2 bg-green-300 border-light-blue-200
                                    shadow text-x1 float-right
                                    hover:font-medium hover:bg-blue-300 hover:text-black 
                                    transform hover:translate-x-3 transition duration-700
                                    rounded-full py-2 px-2"
                                data-toggle="modal" 
                                data-target="#confirm-delete" 
                                type= "button">               
                                    Cerrar
                            </a>   
                            
                            <br><br>     
                            {{-- <a href="{{ route('') }}" 
                                    class="btn btn-outline-primary btn-sm float-right mt-2 ">
                                        Gastos
                            </a>                 --}}
                            <x-agrega-btn route="gastos/create" 
                                          destino="Gastos" />
                            
                        @else
                          
                            <x-agrega-btn route="caja/create" destino="Abrir" />
                            <br><br>    
                                   
                        @endif
                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" 
                                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                Cierre de Caja
                                                            </h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label>
                                                                ¿Estás seguro ?
                                                            </label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action=" {{ route('cerrarCaja') }}" 
                                                                method="get" 
                                                                class="d-inline" >
                                                                
                                                                <button type="submit" 
                                                                        class="btn btn-primary " 
                                                                        >
                                                                            Sí
                                                                </button>
                                                            </form>
                                                            <a class="btn btn-danger" data-dismiss="modal">
                                                                No
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                </div>
            </div>
        </th>
        <th>

        
        </th>
    <tr>
</table>

<div class="container align:right">
  <hr  width= "95%" noshade="noshade"  />
</div>

{{-- @if ( ($cont == 0) || ($gastos < 0 ) )

    <br>
    <x-vacio mensaje="Sin Movimientos x ahora" />
@else --}}
{{-- @if  ($todas->count()) --}}
<div class="container mt-4">
    <div class="row justify-content-center mx-auto ">
      
          <table class="table border-rounded shadow" >
            <thead class="table-warning font-normal text-center text-black-500" >
              <tr>
                <th scope="col">
                                        Operación
                                    </th>
                                    <th scope="col">
                                        N Fact
                                    </th>
                                    <th scope="col">
                                        Fecha
                                    </th>
                                    <th scope="col">
                                        Hora
                                    </th>
                                    <th scope="col">
                                        Vendedor
                                    </th>
                                    <th scope="col">
                                        Cliente
                                    </th>
                                    <th scope="col">
                                        Efectivo  
                                    </th>
                                    <th scope="col">
                                        Tarjetas
                                    </th>
                                     <th scope="col">
                                        Remito
                                    </th> 
                                    
                                    <th scope="col">
                                        Pedidos
                                    </th> 
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($todas as $item)
                                <thead>
                                <tr class="text-center text-xs">
                                    <th>
                                         {{  $item->id }}
                                    </th> 
                                    <th>
                                        @if( $item->numfact > 0 )
                                            {{  $item->numfact }}                                        
                                        @else
                                             {{ ' No Generada '}} 
                                        @endif 
                                    </th> 
                                    <th>                                      
                                         {{ $item->created_at->format('d/m/y')  }}<br>
                                    </th>
                                    <th>
                                         {{ $item->created_at->format('H : i ')  }}<br>
                                    </th>
                                    <th>
                                         {{  $users[ ($item->users_id)-1]->name }}
                                    </th>
                                    <th>
                                         {{  $item->apellidoyNombre }}
                                    </th>
                                    <th>
                                        @if($item->tipoPago==1)
                                            $ {{  $item->total }}
                                            @else
                                            $ {{'-' }}
                                        @endif
                                    </th>
                                    <th>
                                        @if($item->tipoPago!=1)
                                            $ {{  $item->total }}
                                            @else
                                            $ {{ '-' }}
                                        @endif
                                    </th>
                                 
                                    <th>
                                        <a href=" {{ route ('imprimirRemit', $item->id) }}" 
                                            class="btn btn-warning shadow" >
			                                    Ver
                                        </a>
                                    </th> 
                                    <th>
                                        {{-- revisar ciclos  --}}
                                        @foreach ( $pedis as $pedi )
                                            
                                            {{-- @if($pedi->id == $item->id)
                                                "Enviado"
                                            @else
                                            --}}
                                           {{--  @if($pedi->id == $item->id)
                                                        {{'Existe'}}
                                            @else --}}
                                               
                                            {{-- @endif --}}
                                        @endforeach
                                        <a href=" {{ route ('pedidos.enviar', $item->id) }}" 
                                            class="btn btn-success shadow" >
                                                Generar
                                        </a>
                                    </th> 
                                    
                                    <!-- 
                                     <th>
                                        <a  href=" {{ route ('exportarCsv', $item->id) }}" 
                                            class="btn btn-outline-success" >
			                                    Cabe
                                        </a>
                                        
                                        <a  href=" {{ route ('exportarCsvIva', $item->id) }}" 
                                            class="btn btn-outline-success" >
			                                    Iva
                                        </a>
                                    </th> 
                                      -->
                                   
                                </tr>
                                </thead>
                            @endforeach
                            @foreach ($gastos as $item2)
                                <thead>
                                    <tr class="text-center text-xs">
                                    <th>

                                    </th> 
                                    <th>

                                    </th>
                                    <th>
                                        {{ $item2->created_at->format('d/m/y')  }}<br>
                                    </th> 
                                    <th>
                                        {{ $item2->created_at->format('H : i ')  }}<br>
                                    </th> 
                                    <th>
                                        {{  $users[ ($item2->users_id)-1]->name }}
                                    </th> 
                                    <th>
                                        {{  $item2->detalle }}
                                    </th>
                                    <th>
                                        - $ {{  $item2->monto }}
                                    </th>
                                    <th>
                                    </th>
                                    <th>
                                    
                                    </th> 
                                    <th>
                                        
                                    </th> 
                                </thead>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
{{-- 
            </div>
        </div>
    </div>    
     --}}
{{-- @endif --}}

@endsection

