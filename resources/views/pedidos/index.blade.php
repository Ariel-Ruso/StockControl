@extends('layouts.app')

@section('content')

    <x-header titulo="Pedidos" />  

    @if($pedidos->count())

        <div class="container mt-4 col-md-8">
            <div class="row justify-content-center mx-auto ">
            
                <table class="table border-rounded shadow" >
                    <thead class="table font-normal text-center text-black-500 index" >
                    <tr>  
                                        <th scope="col">
                                            N Pedido
                                        </th>
                                        <th scope="col">
                                            Fecha
                                        </th>
                                        <th scope="col">
                                            Hora
                                        </th>
                                    
                                        <th scope="col">
                                            Cliente
                                        </th>
                                        <th scope="col">
                                            Estado
                                        </th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $item)
                                        <thead>
                                            <tr class="text-center text-xs">
                                                <th>
                                                
                                                    <a href=" {{ route('pedidos.show', $item) }}">
                                                        {{ $item->id }}
                                                        <i class="fa fa-truck  fa-lg" 
                                                            aria-hidden="true">
                                                        </i>
                                                    </a>
                                                </th> 
                                                <th>                                      
                                                    {{ $item->created_at->format('d/m/y')  }}<br>
                                                </th>
                                                <th>
                                                    {{ $item->created_at->format('H : i ')  }}<br>
                                                </th>
                                                <th>
                                                    {{  $clientes[ ($item->clientes_id)-1]->nombre }}
                                                </th>
                                                
                                                <th>
                                                {{--  <div class="custom-control custom-switch">
                                                        <input  type="checkbox" 
                                                                class="custom-control-input" 
                                                                id="$item->id">
                                                        <label  class="custom-control-label"    
                                                                for="$item->id">
                                                            Entregado
                                                        </label>
                                                    </div> --}}
                                                
                                                @if($item->estado == 0)
                                                        {{-- {{  'Sin Entregar' }} --}}
                                                        <a href=" {{ route ('entregarP', $item->id) }}" 
                                                            class="btn btn-outline-primary shadow " >
                                                                Enviar
                                                        </a>
                                                    @else
                                                        {{ 'Entregado'}}
                                                    @endif 
                                                </th>
                                            
                                            
                                            
                                            </tr>
                                        </thead>
                                    @endforeach
                                
                                </tbody>
                            </table>
            </div>
        </div>    
        @else
        <br>
        <x-vacio mensaje="Sin Pedidos ahora" />    
    @endif
@endsection

