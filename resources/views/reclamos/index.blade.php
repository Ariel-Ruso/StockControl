@extends('layouts.app')

@section('content')

  <x-header titulo="Reclamos" />  

  <table class= "table">
    <tr>
      <th>

        <div class="container mt-3" name="busqueda" >
          <nav class="d-flex navbar navbar-light float-right tablet: d-flex flex-col">
            <form  class="form-inline col-auto " action= "{{ route('buscaNombre') }}" >
                <input    name="nombre" 
                          id= "nombre"
                          class="form-control mr-sm-2" 
                          type="search" 
                          placeholder="DNI Cliente" 
                          aria-label="Search"
                          >
                <input    name="codigo" 
                          id= "codigo"
                          class="form-control mr-sm-2 " 
                          type="search" 
                          placeholder="Num Factura" 
                          aria-label="Search"
                          >
                <input    name="marca" 
                          id= "marca"
                          class="form-control mr-sm-2 " 
                          type="search" 
                          placeholder="Num Remito" 
                          aria-label="Search"
                          >
              
              <button class="btn btn-outline-success sm" 
                      type="submit" 
                      >
                            Buscar
                    </button>
          </nav><br><br>
        </div>

      </th>

      <th >

        <x-agrega-btn route="create" destino="Agregar" />
        <br>
        <br>    

      </th>
    </tr>
  </table>

  {{-- 

  <div class="container align:right">
    <hr  width= "95%" noshade="noshade"  />
  </div> --}}

  <!-- si vuelve vacio -->
  @if($cont==0)
  <br>
      <div class="text-center text-4xl font-extrabold leading-none tracking-tight">
          <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
              Sin reclamos
          </span>
      </div>
  @else
        <!-- si hay resultado armo tabla --> 
    <div class="container mt-4">
      <div class="row justify-content-center mx-auto ">
        <div class= "">
            
            <table class="table border-2 border-rounded" >
              <thead class="table-info font-weight-bolder font-extrabold text-center 
                      " >
                <tr>
                  <th scope="col">
                    Num Reclamo
                  </th>
                  <th scope="col">
                      Factura Afip
                  </th>
                  
                  <th scope="col">
                      Dni Cliente
                  </th>
                  <th scope="col">
                      Total
                    </th>
                  <th scope="col">
                      Artículo
                  </th>
                  <th scope="col-4">
                      Fecha
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($recl as $item)
                  <tr class="font text-xs text-center" width= "100%"> 
                    <td>
                      {{ $item->id }}
                    </td>           
                    <td>
                      {{ $item->nFact }}
                    </td>           
                    
                  
                    <td>
                      {{ $item->dni }}
                    </td>
                    <td>
                      $ {{ $item->total }}
                    </td>
                    <td>
                      {{ $item->articulos }}
                    </td>
                    <td>                     
                      {{ $item->created_at->format('d/m/y') }}
                    </td>
                    

                  </tr>
                @endforeach
              </tbody>
            </table>
        </div>        
      </div>
          
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




    


