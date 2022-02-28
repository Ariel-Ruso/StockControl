@extends('layouts.app')

@section('content')

<div class="float-right 
            contBtn
        ">
    @component('components.botones')
    @endcomponent
    <br>
    @if( $estado == 1 )
                    <div class="container">
                        <a  class= "btnn btnClose shadow  py-2 px-2 mb-1 "
                            data-toggle="modal" 
                            data-target="#confirm-delete" 
                            type= "button">               
                            
                                Cerrar
                        </a>   
                    </div>
                    <br>
    
                    <x-agrega-btn route="gastos/create" 
                                destino="Gastos" />
                
    @else
                    <x-agrega-btn route="caja/create" destino="Abrir" />
    @endif
</div>

<h2>
    Caja
</h2>
  <br>


<table class= "table caja">
    <tr >
        {{-- col izq --}}
        <th >
            <h4>
                Monto Inicial: 
            </h4>
            
        </th>
        <th>
            $ {{ $montoIni }}
        </th>

        <tr>
            <th >
                <h4>
                    Estado: 
                </h4>
            </th>
            <th>
                {{ $status }}
            </th>
        </tr>
        <tr>
            <th >
                <h4>
                    Total Diario:
                </h4>
            </th>
            <th>
                $ {{ $totDiario }}
            </th>
        </tr>
        <tr>
            <th >
                <h4>
                    Fecha:
                </h4>
            </th>
            <th>
                {{ today()->format('d/m/y') }}
            </th>
        </tr>
    </table>
           {{-- class="text-align:left ">
             <div name= "info de Caja" class="container  ">
            <div class="col-md-10 ml-5">
                <div class="text-left text-1xl font-extrabold leading-none tracking-tight"> --}}
                    {{-- <span class="mt-1 bg-clip-text text-transparent bg-gradient-to-r 
                                from-teal-400 to-green-500">
                     --}}           
                     
                        
                    {{-- </span> --}}
                          
               {{--  </div>
            </div> --}}  
            {{-- 
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
 --}}
       {{--  <th class= "container col-5" >
        </th>
        {{-- col der 
        
        <th class="text-align:right ">
                
             <div class="container   " name="Add">
                <div name="Movim Cajas" 
                    class="container mt-4 float "
                    >
                        @if( $estado == 1 )
                            <br>  
                            <a  
                            class= "btnn btnClose border-solid border-2 bg-green-300 border-light-blue-200
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
                             <a href="{{ route('') }}" 
                                    class="btn btn-outline-primary btn-sm float-right mt-2 ">
                                        Gastos
                            </a>                 
                            <x-agrega-btn route="gastos/create" 
                                          destino="Gastos" />
                            
                        @else
                          
                            <x-agrega-btn route="caja/create" destino="Abrir" />
                            <br><br>    
                                   
                        @endif
                        
                        
                </div>
            </div>
        </th>
        <th>

        
        </th>
    <tr>
</table> --}}
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" 
                                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title">
                                                                Cierre de Caja
                                                            </h3>
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

<div class="container align:right">
  <hr  width= "95%" noshade="noshade"  />
</div>
   

@if  ( $todas->count() || $gastos->count() ) 
    <div class="container mt-4">
        <div class="row justify-content-center mx-auto ">
            <table class="table border-rounded shadow" >
                <thead class="table font-normal text-center text-black-500 index" >
                <tr>
                    @if (Auth::user()->name == 'Akihay') 
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
                    @else
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
                                    
                    @endif
                </tr>
                </thead>
                <tbody>
                    @foreach ($todas as $item)    
                    <thead>
                        <tr class="tData">  
                            @if (Auth::user()->name == 'Akihay')
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
                                    @if($item->pedido != 1)
                                        <a href=" {{ route ('pedidos.enviar', $item->id) }}" 
                                            class="btn btn-success shadow" >
                                                Generar
                                        </a> 
                                    @else
                                        Enviado
                                    @endif
                                </th> 
                            
                            @else
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
                            @endif
                        </tr>
                    </thead>
                    @endforeach
                    @foreach ($gastos as $item2)
                        <thead>
                            <tr class="text-center text-xs">
                                @if (Auth::user()->name == 'Geminis') 
                                    <th></th>
                                    <th>
                                        {{ $item2->created_at->format('d/m/y')  }}<br>
                                    </th>   
                                    <th></th>                                          
                                    <th>
                                        {{  $item2->detalle }}
                                    </th>
                                    <th>
                                        - $ {{  $item2->monto }}
                                    </th>
                                @else
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
                                
                                @endif
                            </tr>
                        </thead>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else                                       
   <br>
    <x-vacio mensaje="Sin Movimientos x ahora" />
@endif                              
                                 
                                    <!-- 
                                     <th>
                                        <a  href=" 
                                        {{-- {{ route ('exportarCsv', $item->id) }}"  --}}
                                            class="btn btn-outline-success" >
			                                    Cabe
                                        </a>
                                        
                                        <a  href=" 
                                        {{-- {{ route ('exportarCsvIva', $item->id) }}"  --}}
                                            class="btn btn-outline-success" >
			                                    Iva
                                        </a>
                                    </th> 
                                      -->
                                    
                           

@endsection

