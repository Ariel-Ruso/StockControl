@extends('layouts.app')

@section('content')

<div class="float-right">
  @component('components.botones')
  @endcomponent
</div>
<x-grafica img="/Storage/orden.png"/>
<br>

<table class= "table">
    <tr>
      <th class="container col-md-9"  >
        {{-- col izq --}}
      </th>
      <th class="container mt-3 col-md-2">
        
        
      </th>
      <th class="container mt-3 col-md-1">
        <x-agrega-btn route="ordenes/create" 
                      destino="Crear" />
      </th>
    </tr>
</table>

@if($orders->count()>0)


<div class="container mt-4 col-md-6">
  <div class="row justify-content-center mx-auto ">
    
        <table class="table border-rounded shadow" >
          <thead class="table-warning font-normal text-center text-black-500" >
            <tr>  
                        <th scope="col">
                            Detalle
                        </th>
                        <th scope="col">
                          Fecha
                      </th>
                        <th scope="col">
                            Estado
                        </th>
                      </tr>
                      
                    </thead>
                    <tbody>
                      @foreach($orders as $item)
                      <tr class="px-6 py-3 text-center ">
                          <td>    
                              {{ $item->detalle }}
                          </td>

                          <td>
                            {{ $item->created_at->format('d/m/y')  }}<br>
                          </td>
                          <td>
                            @if ($item->estado==0)
                              {{"Sin armar"}}
                            @else
                              {{ "Armado" }}
                            @endif
                            
                          </td>                            
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            
          </div>
  </div>
  @else
    <br>
     <x-vacio mensaje="Sin Ordenes ahora" />
  @endif
  
@endsection