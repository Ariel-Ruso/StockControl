@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

<div class="container col-md-6 ">
    <br>
            <div class="row justify-content-center ">
                    <div class="container mx-auto ">
                        <!-- <img src="Storage/user.png" height="700" width="600" > -->
                    </div>
            </div>      
    </div>    
<!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
<div class="row justify-content-center ">
    <div class="col-md-8">
      <div class="flex flex-col mt-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class=" shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ">
            <div class=" py-3 px-8 d-flex justify-content-between align-items-center">
              <table class=" min-w-full divide-y divide-green-300">
                <thead>
                  <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 
                    font-medium text-gray-500 uppercase tracking-wider">
                      Nombre
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 
                    font-medium text-gray-500 uppercase tracking-wider">
                      Direccion
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 
                    font-medium text-gray-500 uppercase tracking-wider">
                      Correo
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 
                    font-medium text-gray-500 uppercase tracking-wider">
                      Rol
                    </th>
                    <th class="px-6 py-3 bg-gray-50"></th>
                  </tr>
                </thead>
                @foreach ($users as $item)
                <tbody class="bg-white divide-y divide-gray-200">
                  <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm leading-5 font-medium text-gray-900">
                                    {{ $item->nombre}}
                                </div>                          
                            </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 text-gray-900">
                          {{ $item->direccion }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                      <div class="text-sm leading-5 text-gray-900">
                          {{ $item->correo }}
                        </div>
                    </td>
                    </td> <td class="px-6 py-4 whitespace-no-wrap">
                      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                      
                        {{ $rols[ ($item->rols_id)-1 ]->nombre }}
                      </span>
                    </td>
                  </tr>
                  <!-- More rows... -->
                </tbody>
                @endforeach
              </table><br>
              </div>
              {{ $users->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection