@extends('layouts.app')

@section('content')

<div class="float-right">
      @component('components.botones')
      @endcomponent
</div>
<x-grafica img="/Storage/celulares.jpeg" />
<br><br>

<table class= "table ">
  <tr>
    <th>
    
    </th>
    <th >
    {{-- col cent --}}
    
    </th>
    <th >
     {{-- col derecha --}}
      
      <x-agrega-btn route="imeis/create" 
                    destino="Crear" />
      <br><br>
      
    </th>
   
  </tr>
</table>

<!-- si vuelve vacio -->
@if($cont==0)
    <br>
     <x-vacio mensaje="Sin productos en Stock" />
@else
      <!-- si hay resultado armo tabla --> 
  <div class="container mt-4">
    <div class="row justify-content-center mx-auto ">
      
          <table class="table border-rounded shadow" >
            <thead class="table-warning font-normal text-center text-black-500" >
              <tr>
                <th scope="col">
                    Imei
                </th>
                <th scope="col">
                    Id de Celu
                  </th>
                
                <th scope="col-4">
                    Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($imeis as $item)
                <tr class="font text-xs text-center " width= "100%"> 
                  <td>
                    {{ $item [ ($celus->id_imeis)-1 ]->detalle }}
                  </td> 
                  <td>  
                    
                      {{ $item->nombre }}
                    
                  </td>
                  
                </tr>
              @endforeach
            </tbody>
          </table>
      
    </div>
        {{ $imeis->links() }}
  </div>
  <!-- 
<div class="container">
  <a href=" {{ route ('articulosPdf') }}" class="btn btn-primary" >
        Imprimir pdf
    </a>
    <a href=" {{ route ('articulosPdfHoriz') }}" class="btn btn-success" >
        Imprimir pdf Horizontal
    </a>
</div> -->

@endif   

  
@endsection




    


