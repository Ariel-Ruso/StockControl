@extends('layouts.app')

@section('content')
  
  <x-header titulo="Categorias" />  


  <x-agrega-btn route="categorias/create" 
                        destino="Crear" />

  @if($cont==0)

        <br>
      <x-vacio mensaje="Sin Categorías ahora" />
  @else

    <div class="container col-md-6">
      <div class="row justify-content-center mx-auto ">
            <table class="table border-rounded shadow" >
              <thead class="index" >
                <tr>
                  <th scope="col">      
                    Nombre
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
                                  <a  href="{{ route ('categorias.edit',$item) }}" 
                                      class="btn btn-warning btn-sm shadow">
                                        <i class= "fa fa-edit">
                                          Editar 
                                        </i>
                                  </a>
                                {{--  <button class="btn btn-danger btn-sm shadow" 
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
                                                      
                                                      <form action=" {{ route('categorias.destroy', $item) }}" 
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
      </div>  
                          

  @endif
    
@endsection