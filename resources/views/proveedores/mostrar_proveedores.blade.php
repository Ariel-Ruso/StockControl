@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

<div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                  <br><br>
                  <table class="table">
                    <thead class="table-primary">
                      <tr class="px-6 py-3 text-center text-xs leading-4 
                        font-medium text-black-500 uppercase tracking-wider">
                        
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
                            Telefono
                        </th>
                        <th scope="col">
                            Direccion
                        </th>
                        <th scope="col">
                            Acciones
                        </th>
                      </tr>
                      
                    </thead>
                    
                    <tbody>
                      @foreach($proves as $item)
                        <tr>
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
                            <form   action=" {{ route('eliminar_proveedor', $item) }}" 
                                    method="Post" 
                                    class="d-inline" >
                                      @method ('DELETE')
                                      @csrf
                                <button class="btn btn-danger btn s-m" 
                                        type="submit" > 
                                          Eliminar         
                                </button>
                            </form>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
          </div>
  </div>
@endsection