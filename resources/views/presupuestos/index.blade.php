@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
</div>
{{-- <x-grafica img="/Storage/presupuestos.jpg" /> --}}
<h2>
    Presupuestos
</h2>
<br><br>

<table class= "table">
      <th >  
      </th>
</table>

@if($presu->count())
      

    
<div class="container mt-4">
    <div class="row justify-content-center mx-auto ">
      
          <table class="table border-rounded shadow" >
            <thead class="table-warning font-normal text-center text-black-500" >
              <tr>
                <th scope="col">

                                        N Presupuesto
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
                                        Total
                                    </th> 
                                    <th scope="col">
                                        Pdf
                                    </th> 
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($presu as $item)
                                <thead>
                                <tr class="text-center text-xs">
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
                                         $ {{  $item->total }}
                                    </th>
                                   
                                    <th>
                                        <a href=" {{ route ('imprimirPresu', $item->id) }}" 
                                            class="btn btn-outline-primary shadow" >
			                                    Imprimir
                                        </a>
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
    <x-vacio mensaje="Sin Presupuestos ahora" /> 
@endif

@endsection

