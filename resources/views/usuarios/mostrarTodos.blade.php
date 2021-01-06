@extends('layouts.app')

@section('content')

        <div class="container col-md-6 " name= "grafica">
            <div class="row justify-content-center ">
                    <div class="container mx-auto ">
                        <img src="/Storage/user.png" height="700" width="600" >
                    </div>
            </div>      
        </div>
        <br>    

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent
   
<!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->
<div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                  <table class="table">
                    <thead class="table-primary">
                      <tr class="px-6 py-3 text-center text-xs leading-4 
                        font-medium text-black-500 uppercase tracking-wider">
                        <th>
                          Nombre
                        </th>
                    <th >
                      Correo
                    </th> 
                  </tr>
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
  
@endsection