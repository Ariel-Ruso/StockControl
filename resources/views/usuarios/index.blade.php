@extends('layouts.app')

@section('content')

  <div class="float-right">
          @component('components.botones')
          @endcomponent
  </div>
{{-- <x-grafica img="/Storage/usuarios.png" /> --}}
<x-grafica $mens="Usuarios" />
<br><br>

<table class= "table">
  <th>
  </th>
</table>
{{-- 
<div class="container ">
  <a href="{{ route('index_r') }}" 
          
          class= "border-solid border-2 bg-blue-200 border-light-blue-200
                shadow-md text-x1 float-right
                hover:font-medium hover:bg-red-300 hover:text-black 
                transform hover:scale-120 transition duration-700 inline-block
                rounded-full py-3 px-2">
               Permisos
   </a>
   <br>
</div> --}}

@component('components.mensajes')
@endcomponent
   
@if ($cont==0)
  <x-vacio mensaje="Sin Usuarios" />
@else
  
  {{-- <x-tabla titulo="Detalles" col1="Nombre" col2="Correo" col3="" :items="$users" />  --}}

  <div class="container mt-4 col-md-6">
    <div class="row justify-content-center mx-auto ">
      
          <table class="table border-rounded shadow" >
            <thead class="table-warning font-normal text-center text-black-500" >
              <tr>  
                 <th scope="col">
                          Nombre
                  </th>
                  <th scope="col">
                          Correo
                  </th>            
                  <th scope="col">
                    Rol
                  </th>
                  <th scope="col">
                    Accion
                  </th>
                </tr>
            </th>            
                
              </thead>
              @foreach ($users as $item)
                <tbody >
                  <tr class="px-6 py-3 text-center ">
                    <td >
                        {{ $item->name}}
                    </td>
                    <td>
                        {{ $item->email }}
                    </td> 
                    <td>
                      {{-- {{ $roles[$item->id]->name  }} --}}
                    </td>
                   <td>
                    {{-- <a  href="{{ route ('usuarios.edit', $item) }}" 
                        class="btn btn-warning btn-sm shadow">
                        <i class= "fa fa-edit">
                          Editar 
                        </i>
                     </a>--}}
                   </td>
                  </tr>
                  
                </tbody>
                @endforeach
              </table><br>
            </div>
          {{ $users->links() }}
      </div>
    </div>
  </div>
   
   @endif
@endsection