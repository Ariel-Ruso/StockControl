@extends('layouts.app')

@section('content')
  
    <x-header titulo="Ventas" />  

    <div name="tabla facturacion" class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class=" card bg-white shadow">
                        <table class="table ">

                            <thead class="reports">
                                <tr class=
                                {{-- " text-center text-xs leading-4 
                                font-medium text-red-500 uppercase tracking-wider" --}}
                                >
                                    {{-- <th scope="col">
                                        Operación
                                    </th> --}}
                                    <th scope="col">
                                        N Fact
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
                                        Cliente
                                    </th>
                                    <th scope="col">
                                        Efectivo  
                                    </th>
                                    <th scope="col">
                                        Tarjetas
                                    </th>
                                    {{-- <th scope="col">
                                        Remito
                                    </th> 
                                    <th scope="col">
                                        Factura
                                    </th>  --}}
                                </tr>
                                                        
                            
                            </thead>
                            <tbody>
                                @foreach ($todas as $item)
                                    <thead>
                                    <tr class="text-center text-xs font-medium text-black-500">
                                    {{--  <th>
                                            {{  $item->id }}
                                        </th>  --}}
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
                                    
                                        {{-- <th>
                                            <a href=" {{ route ('imprimirRemit', $item->id) }}" 
                                                class="btn btn-outline-warning" >
                                                    Ver
                                            </a>
                                        </th>  --}}
                                        {{--
                                        <th>
                                            
                                            @if( $item->numfact > 0 )
                                                <a href=" {{ route ('generarFactura', $item->id) }}" 
                                                    class="btn btn-outline-danger disabled " >
                                                        Generar 
                                                </a> 
                                            @else
                                                <a href=" {{ route ('generarFactura', $item->id) }}" 
                                                    class="btn btn-outline-danger " >
                                                        Generar 
                                                </a>
                                            @endif

                                        </th> 
                                        --}}
                                        {{-- <th>
                                            @if( $item->numfact > 0 )
                                                <a href=" {{ route ('imprimirFact', $item->id) }}" 
                                                    class="btn btn-outline-primary " >
                                                        Ver 
                                                </a>
                                            @else
                                                <a href=" {{ route ('imprimirFact', $item->id) }}" 
                                                    class="btn btn-outline-primary disabled " >
                                                        Ver 
                                                </a>
                                            @endif

                                        </th>  --}}
                                    </tr>
                                    </thead>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>    
    

@endsection