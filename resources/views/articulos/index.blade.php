@extends('layouts.app')

@section('content')

<div class="float-right">
      @component('components.botones')
      @endcomponent
</div>
<x-grafica img="/Storage/articulos.jpg" />
<br><br>

<table class= "table ">
  <tr>
    <th>
    {{-- col izq --}}
        <label class="alert alert-primary border shadow mx-5" >
        <nav class="d-flex navbar navbar-light float-right tablet: d-flex flex-col">
          <form  class="form-inline col-auto " action="{{ route('articulos.search') }}" >
              <input    name="nombre" 
                        id= "nombre"
                        class="form-control mr-sm-2 col-4" 
                        type="search" 
                        placeholder="Nombre" 
                        aria-label="Search"
                        >
              <input    name="codigo" 
                        id= "codigo"
                        class="form-control mr-sm-2 col-2" 
                        type="search" 
                        placeholder="Código" 
                        aria-label="Search"
                        >
              <input    name="marca" 
                        id= "marca"
                        class="form-control mr-sm-2 col-2" 
                        type="search" 
                        placeholder="Marca" 
                        aria-label="Search"
                        >
              <input   name="modelo" 
                        id= "modelo"
                        class="form-control mr-sm-2 col-2" 
                        type="search" 
                        placeholder="Modelo" 
                        aria-label="Search"
                        >
              <select class="form-control mr-sm-2 col-2" 
                        id="categorias" 
                        name= "categorias">
                            <option selected>
                                  Categorias...
                            </option>
                            @foreach($cates as $item)
                              <option value= "{{ $item->id }}" >
                                {{ $item->nombre }}
                              </option>
                            @endforeach
              </select>
              <br><br>
              <input    name="precioi" 
                        id= "precioi"
                        class="form-control mr-sm-2 col-2" 
                        type="search" 
                        placeholder="Precio Mínimo" 
                        aria-label="Search"
                        >
              <input    name="preciof" 
                        id= "preciof"
                        class="form-control mr-sm-2 col-3" 
                        type="search" 
                        placeholder="Precio Máximo" 
                        aria-label="Search"
                        >
              <select class="form-control mr-sm-2 col-2" 
                        id= "proveedores" 
                        name= "proveedores">
                            <option selected>
                                Proveedores...
                            </option>
                            @foreach($proves as $item)
                              <option value= "{{ $item->id }}" >
                                {{ $item->nombre }}
                              </option>
                            @endforeach
              </select>
              <button class="btn btn-success sm shadow " 
                      type="submit" 
                      >
                          Buscar
              </button>
        </nav>
      </label>
    </th>
    <th >
    {{-- col cent --}}
    
    </th>
    <th >
     {{-- col derecha --}}
      
      <x-agrega-btn route="articulos/create" 
                    destino="Crear" />
      <br><br>
      @component('components.carrito-btn')
      @endcomponent
      <br>
      @component('components.clientes-btn')
      @endcomponent  
      {{-- <x-agrega-btn route="celulares"
                destino="Celulares"/> --}}
    </th>
   
  </tr>
</table>

<!-- si vuelve vacio -->
@if($arts->count())
    

      <!-- si hay resultado armo tabla --> 
  <div class="container mt-4">
    <div class="row justify-content-center mx-auto ">
      
          <table class="table border-rounded shadow" >
            <thead class="table-warning font-normal text-center text-black-500" >
              <tr>
                <th scope="col">
                    Nombre
                </th>
                <th scope="col">
                    Cantidad
                  </th>
                <th scope="col">
                    Efectivo
                </th>
                <th scope="col">
                  Tarjeta
              </th>
                <th scope="col">
                    Marca
                </th>
               {{--  <th scope="col">
                    Modelo
                </th> --}}
                <th scope="col">
                    Categoría
                </th>
                <th scope="col">
                    Proveedor                  
                </th>
                <th scope="col-4">
                    Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($arts as $item)
                <tr class="font text-xs text-center " width= "100%"> 
                  {{-- <td>
                    {{ $item->codigo }}
                  </td> --}}
                  <td>  
                    <a href=" {{ route('articulos.show', $item) }}">
                      {{ $item->nombre }}
                    </a>
                  </td>
                  
                  <td>
                    {{ $item->cantidad }}
                  </td>
                  <!-- <td>
                  $  {{ $item->precioCompra }} 
                  </td>
                  <td >
                  $  {{ $item->iva }}
                  </td> -->
                  <td>
                  $  {{ $item->precioVenta }}
                  </td>
                  <td>
                    $  {{ $item->pVentaTarj }}
                    </td>
                  <td>
                    {{ $item->marca }}
                  </td>
                 {{--  <td>
                    {{ $item->modelo }}
                  </td> --}}
                  <td>
                    {{ $cates[ ($item->categorias_id)-1 ]->nombre }}
                  </td>
                  <td>
                    {{ $proves[ ($item->proveedors_id)-1 ]->nombre }}
                  </td>
                  <td>
                      <a  href="{{ route ('articulos.edit', $item) }}" 
                          class="btn btn-outline-warning btn-sm shadow">
                          <i class= "fa fa-edit">
                            Editar 
                          </i>
                      </a>
                          <button class="btn btn-outline-danger btn-sm shadow" 
                                  type="button"
                                  data-toggle="modal" 
                                  data-target="#confirm-delete{{$item->id}}" >
                                   <i class= "fa fa-trash">
                                      Eliminar         
                                   </i> 
                          </button>
                          <div  class="modal fade" 
                                id="confirm-delete{{$item->id}}" 
                                tabindex="-1" 
                                role="dialog" 
                                aria-labelledby="exampleModalLongTitle" 
                                aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 class="modal-title">
                                                    Eliminar registro
                                                  </h4>
                                              </div>
                                              <div class="modal-body">
                                                  <h5>
                                                    ¿Estás seguro de eliminar {{$item->nombre}}
                                                     ?
                                                  </h5>
                                              </div>
                                              <div class="modal-footer">
                                                  
                                                  <form action= "{{ route('articulos.destroy', $item->id) }}" 
                                                        method="post" 
                                                        class="d-inline" >
                                                          @method ('DELETE')
                                                          @csrf
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
                      
                      <a  href=" {{ url('agregar/'.$item->id) }}" 
                          class="btn btn-outline-primary btn-sm shadow">
                          <i class= "fa fa-shopping-cart">
                              Vender 
                          </i>
                      </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
      
    </div>
        {{ $arts->links() }}
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
@else
  <br>
     <x-vacio mensaje="Sin productos en Stock" />
@endif   

  
@endsection




    


