@extends('layouts.app')

@section('content')

    <x-header titulo="Caja" />  
    

    @if( $estado == 1 )
                    <div class="container">
                             <!-- class= "   btnn btnClose shadow  py-2 px-2 mb-1 "" -->
                             
                        
                    <a  
                            class= "btnn btnClose shadow
                                float-right
                                py-2 px-2"
                            data-toggle="modal" 
                            data-target="#confirm-delete" 
                            type= "button">               
                            
                                Cerrar
                        </a>    
                    </div>
                    
                    <br>
                    <br>
                    <x-agrega-btn route="gastos/create" 
                                destino="Gastos" />
                
    @else
        <x-agrega-btn route="caja/create" destino="Abrir" />            
    @endif

<table class= "table-sm caja col-md-4">
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
                                    @if( $item->tipoPago!=1 && $item->tipoPago!=6 )
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
                                    @if( $item->tipoPago!=1 && $item->tipoPago!=6 )
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

