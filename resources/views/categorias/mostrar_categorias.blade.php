@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

<div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                  <table class="table">
                    <thead class="table-primary">
                      <tr class=" text-center text-xs leading-4 
                        font-medium text-black-500 uppercase tracking-wider">
                        <th scope="col">
                            Nombre de Categoria
                        </th>
                        <th scope="col">
                            Acciones
                        </th>
                      </tr>
                      
                    </thead>
                    <tbody>
                      @foreach($cates as $item)
                      <tr class="px-6 py-3 text-center ">
                          <td>    
                              {{ $item->nombre }}
                          </td>
                          <td>
                            <form   action=" {{ route('eliminar_categoria', $item) }}" 
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