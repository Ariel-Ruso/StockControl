@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

<div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                  <br><br>
                  <table class="table">
                    <thead class="table-warning">
                      <tr>
                      
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
                        <tr>
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