@extends('layouts.app')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

@section('content')

  <x-header titulo="Proveedores" />  

  <table name="search">
    <tr>
      <th class="container col-md-9 "  >
        {{-- col izq --}}
        <label class="alert alert-primary border shadow mx-5" >
          <nav class="d-flex navbar navbar-light float-left tablet: d-flex flex-col">
            <form  class="form-inline col-auto " action="{{ route('proveedores.search') }}" >
                <input    name="nombre" 
                          id= "nombre"
                          class="form-control mr-sm-2" 
                          type="search" 
                          placeholder="Nombre" 
                          aria-label="Search"
                          >
                <!-- <input    name="dni" 
                          id= "dni"
                          class="form-control mr-sm-2 " 
                          type="search" 
                          placeholder="Dni" 
                          aria-label="Search"
                          > -->
              
                <button class="btn btn-success sm shadow" 
                      type="submit" 
                      >
                            Buscar
                </button>
              </form>
          </nav>
        
      </label>

      </th>
      
      <th class="container mt-3 col-md-2 "> 
        {{-- col cent --}}
      </th  >
      <th class="container mt-3 col-md-1">
        {{-- col der --}}
        
        <x-agrega-btn route="proveedores/create" 
                      destino="Agregar"/>
                      <br>
        <br><br>
        @component('components.carrito-btn')
        @endcomponent
      
      </th>
    </tr>
  </table>
  
  @if($proves->count())
  
    <div class="container mt-4">
      <div class="row justify-content-center mx-auto ">
            <table class="table border-rounded shadow" >
              <thead class="table font-normal text-center text-black-500 index" >
                <tr>
                  <th scope="col">
                    Nombre 
                  </th>
                  <th scope="col">
                      Correo 
                  </th>
                  <th scope="col">
                      Contacto
                  </th>
                  <th scope="col">
                      Teléfono
                  </th>
                  <th scope="col">
                      Dirección
                  </th>
                  <th scope="col">
                      Acciones
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($proves as $item)
                  <tr class="px-6 py-3 text-center ">
                    <td>    
                        {{ $item->nombre }}
                    </td>
                    <td>    
                        {{ $item->correo }}
                    </td>
                    <td>    
                        {{ $item->contacto }}
                    </td>
                    <td>    
                        {{ $item->telefono }}
                    </td>
                    <td>    
                        {{ $item->direccion }}
                    </td>
                    <td>
                        <a  href="{{ route ('proveedores.edit', $item) }}" 
                            class="btn btn-warning btn-sm shadow m-1">
                              <i class= "fa fa-edit">
                                Editar 
                              </i>
                        </a>
                      {{-- 
                          <button class="btn btn-danger btn-sm shadow" 
                                  type="button" 
                                  data-toggle="modal" 
                                  data-target="#confirm-delete">
                                  <i class= "fa fa-trash">
                                      Eliminar         
                                  </i>
                          </button> --}}
                        
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
                                            <label>
                                              ¿Estás seguro de eliminar {{ $item->nombre }},
                                              puede afectar artículos?
                                            </label>
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <form action=" {{ route('proveedores.destroy', $item) }}" 
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
      {{ $proves->links() }}         
    </div>
    

  @else

    <br>
    <x-vacio mensaje="Sin Proveedores ahora" />
    @endif
                  
@endsection


    