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
                    <thead class="table-success">
                      <tr>
                        <th scope="col">
                          <h2>
                          Nombre 
                          </h2>
                        </th>
                        <th scope="col">
                          <h2>
                          Correo 
                          </h2>
                          </th>
                        <th scope="col">
                          <h2>
                          Contacto
                          </h2>
                          </th>
                        <th scope="col">
                          <h2>
                          Direccion
                          </h2>
                          </th>
                        <th scope="col">
                          <h2>
                          Acciones
                          </h2>
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