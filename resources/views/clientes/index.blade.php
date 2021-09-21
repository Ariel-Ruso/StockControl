@extends('layouts.app')

@section('content')

<div class="float-right">
  @component('components.botones')
  @endcomponent
</div>

<x-grafica img="/Storage/clientes.png"/>
<br><br>

<table class= "table mt-1">
  <tr>
    <th class="container col-md-9 "  >
      {{-- col izq --}}
      <label class="alert alert-primary border shadow mx-5" >
        <nav class="d-flex navbar navbar-light float-left tablet: d-flex flex-col">
          <form  class="form-inline col-auto " action="{{ route('clientes.search') }}" >
              <input    name="nombre" 
                        id= "nombre"
                        class="form-control mr-sm-2" 
                        type="search" 
                        placeholder="Nombre" 
                        aria-label="Search"
                        >
              <input    name="dni" 
                        id= "dni"
                        class="form-control mr-sm-2 " 
                        type="search" 
                        placeholder="Dni" 
                        aria-label="Search"
                        >
            
              <button class="btn btn-success sm shadow" 
                    type="submit" 
                    >
                          Buscar
              </button>
            </form>
        </nav><br><br>
      
    </label>

    </th>
    
    <th class="container mt-3 col-md-2 "> 
      {{-- col cent --}}
    </th  >
    <th class="container mt-3 col-md-1">
      {{-- col der --}}
      <x-agrega-btn route="/clientes/create" 
                    destino="Agregar" />
      <br><br>
      @component('components.carrito-btn')
      @endcomponent
    
    </th>
  </tr>
</table>

{{-- @if($cont==0) --}}
@if($clie->count())

<div class="container mt-4">
  <div class="row justify-content-center mx-auto ">
    
        <table class="table border-rounded shadow" >
          <thead class="table-warning font-normal text-center text-black-500" >
            <tr>
              <th scope="col">
  
                            Nombre 
                        </th>
                        <th scope="col">
                            Dni
                        </th>
                        <th scope="col">
                          Cuit
                        </th>
                        <th scope="col">
                            Teléfono
                        </th>
                        <th scope="col">
                            Dirección
                        </th>
                        <th scope="col">
                            Email
                        </th>
                        <th scope="col">
                            Acciones
                        </th>
                      </tr>
                      
                    </thead>
                    <tbody>
                      @foreach($clie as $item)
                      <tr class="px-2 py-3 text-center text-xs">
                          <td>    
                              {{ $item->nombre }}
                          </td>
                          <td>    
                              {{ $item->dni }}
                          </td>
                          <td>    
                            {{ $item->cuit }}
                          </td>
                          <td>    
                              {{ $item->telefono }}
                          </td>
                          <td>    
                              {{ $item->direccion }}
                          </td>
                          <td>    
                              {{ $item->email }}
                          </td>
                          
                          <td>
                          <a   href=" {{ route('clientes.select', $item->id) }}" 
                              class="btn btn-outline-primary btn-sm shadow">
                              <i class= "fa fa-shopping-cart">
                                  Seleccionar
                              </i>
                          </a>
                              <a  href="{{ route ('clientes.edit', $item->id) }}" 
                                  class="btn btn-outline-warning btn-sm shadow">
                                    <i class= "fa fa-edit">
                                      Editar 
                                    </i>
                              </a>
                              <button class="btn btn-outline-danger btn-sm shadow" 
                                      type="button"  
                                      data-toggle="modal" 
                                      data-target="#confirm-delete">
                                      <i class= "fa fa-trash">
                                            Eliminar         
                                      </i>       
                              </button>

                            
                            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" 
                                      aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 class="modal-title">
                                                    Eliminar registro
                                                  </h4>
                                              </div>
                                              <div class="modal-body">
                                                  <h5>
                                                    ¿Estás seguro de eliminar {{ $item->nombre}} ?
                                                     
                                                  </h5>
                                              </div>
                                              <div class="modal-footer">
                                                  <form action=" {{ route('clientes.destroy', $item) }}" 
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
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  
            </div>
            {{ $clie->links() }}
          </div>
    </div>
    

@else
<br>
     <x-vacio mensaje="Sin Clientes ahora" />

  @endif
    
@endsection