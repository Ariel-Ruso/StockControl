@extends('layouts.app')

@section('content')

@component('components.inicio-btn')
@endcomponent
<br><br>

</div>

@component('components.mensajes')
@endcomponent
   
<div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-primary">
                      <tr class="px-6 py-3 text-center text-xs leading-4 
                        font-medium text-black-500 uppercase tracking-wider">
                        <th  scope="col">
                          Id 
                        </th>
                        <th  scope="col">
                          Nombre de Rol
                        </th>
                        <th scope="col-5">
                          Acciones
                        </th>
                        
                      </tr>
                  </thead>
                @foreach ($roles as $item)
                <tbody >
                  <tr class="px-6 py-3 text-center ">
                    <td >
                      {{ $item->id}}
                    </td>
                    <td >
                        {{ $item->name}}
                    </td>
                    <td>
                      <a href= '' class= "btn btn-sm btn-outline-warning">
                        <i class= "fa fa-edit">
                          Editar 
                        </i>
                      </a>
                    
                    
                      <form action= "">
                        <button type= "submit" class= "btn btn-sm btn-outline-danger">
                          <i class= "fa fa-trash">
                            Eliminar         
                         </i> 
                        </button>
                      </form>

                  </tr>
                  
                </tbody>
                @endforeach  
              </table><br>
            </div>
          {{-- {{ $users->links() }} --}}
      </div>
    </div>
  </div>
  
@endsection