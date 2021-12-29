@extends('layouts.app')

@section('content')

<div class="float-right 
            contBtn
        ">
    @component('components.botones')
    @endcomponent
    <br>
</div>
<h2>
    Caja
</h2>
  <br><br>


<div name="tabla facturacion" class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-green-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            <h3>

                          
                          Movimientos -
                          {{ today()->format('d/m/y') }}
                        </h3>
                        </span>             
                    </div>
                    <div class="container">
                        <table class="table">
                            <thead >
                                <tr class=" text-center text-xs leading-4 
                                    font-medium text-black-500 uppercase tracking-wider">
                                    <th scope="col">
                                        N Fact
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
                                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todas as $item)
                                <thead>
                                    <tr class="text-center">
                                    <th>
                                    
                                        @if( $item->numfact > 0 )
                                            {{  $item->numfact }}                                        
                                        @else
                                                {{ ' No Generada '}} 
                                        @endif 
                                        
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

                                    </tr>
                                </thead>
                                @endforeach
                                @foreach ($gastos as $item2)
                                    <thead>
                                        <tr class="text-center text-red-500">
                                            <th>
                                                {{ $item2->detalle }}
                                            </th>
                                            <th>
                                                {{ $item2->created_at->format('H : i ')  }}<br>
                                            </th>
                                            <th>
                                                {{  $users[ ($item2->users_id)-1]->name }}
                                            </th>
                                            <th>
                                                
                                            </th>
                                            <th>
                                                $ - {{ $item2->monto }}
                                            </th>
                                            <th>
                                                
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
    <br><br>


<div name="tabla facturacion" class="container mt-10 ">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="card bg-white shadow">
                <div class=" py-3 px-8 bg-green-200 d-flex justify-content-between align-items-center">
                    <span class="text-center mx-auto font text-2xl">
                        <h3>
                            Final de Caja
                        </h3>
                        
                    </span>             
                </div>
                <div class="container">
                    <table class="table">
                        <thead >
                            <tr class=" text-center text-xs leading-4 
                                font-medium text-black-500 uppercase tracking-wider">
                                <th scope="col">
                                    Apertura Caja
                                </th>
                                <th scope="col">
                                    Efectivo
                                </th>
                                <th scope="col">
                                    Tarjetas
                                </th>
                                <th scope="col">
                                    Totales
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        $ {{  $montoIni }}
                                    </th>
                                    <th>
                                        $ {{  $efect }}
                                    </th>
                                    <th>
                                        $ {{  $tarj }}
                                    </th>
                                    <th>
                                        $ {{  $total }}                                      
                                    </th>
                                </tr>
                            </thead>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
                  
     <div class="container mx-auto mt-5">
		<a href=" {{ route ('cierre_cajaPdf') }}" class="btn btn-success" >
			Imprimir pdf 
		</a>
	</div> 

@endsection