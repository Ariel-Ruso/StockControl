@extends('layouts.app')

@section('content')
<div class="float-right">
    @component('components.botones')
    @endcomponent
  </div>
  <h2>
    Clientes
</h2>

<br><br>
<table class= "table mt-1">
    <th>
    </th>
</table>

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card 
                {{-- bg-white  --}}
                 shadow">
                  <div class=" py-3 px-8 cart2
                  {{-- bg-blue-200 d-flex justify-content-between align-items-center --}}
                  ">
                    {{-- <span class="text-center mx-auto font text-xl"> --}}
                      <h3>
                        
                        Cliente # {{ $clie-> id }}
                      <h3>
                    {{-- </span>						 --}}
            <div class="col-md-6">
                {{-- 
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                    <span class="text-center mx-auto font text-2xl">
                            
                        </span>                   
                        --}}
                    </div> 
                </div> 
                    <div class="card-body">     
                      <form   action="{{ route('clientes.update', $clie->id) }}" 
                              method="POST"
                              enctype= "multipart/form-data"
                              >
                            @method ('put')
                            @csrf

                            <div class="container" name= "errores">
                                @error('nombre')
                                <div class="alert alert-success">
                                    Nombre obligatorio
                                </div>
                                @enderror
                                
                            </div>

                            <div class="container col-8" name="etiquetas">
                            <br>
                                <label > 
                                    Dni:          
                                </label>
                                    <input
                                        type="text"
                                        name="dni"
                                        value= "{{ $clie->dni }}"
                                        class="form-control mb-2"
                                    />   
                                    <label > 
                                        Cuit:          
                                    </label>
                                        <input
                                            type="text"
                                            name="cuit"
                                            value= "{{ $clie->cuit }}"
                                            class="form-control mb-2"
                                        />   
                                <label > 
                                    Email:          
                                </label>
                                    <input
                                        type="text"
                                        name="email"
                                        value= "{{ $clie->email }}"
                                        class="form-control mb-2"
                                    />   
                                <label > 
                                    Nombre:          
                                </label>
                                    <input
                                        type="text"
                                        name="nombre"
                                        value= "{{ $clie->nombre }}"
                                        class="form-control mb-2 "
                                    />     
                                <label > 
                                    Dirección:          
                                </label>
                                    <input
                                        type="text"
                                        name="direccion"
                                        value= "{{ $clie->direccion }}"
                                        class="form-control mb-2"
                                    />   
                                
                                <label > 
                                   Teléfono:          
                                </label>
                                    <input
                                        type="text"
                                        name="telefono"
                                        value= "{{ $clie->telefono }}"
                                        class="form-control mb-2"
                                    />   
                                
                                <label > 
                                    Cta Cte:          
                                 </label>
                                     <input
                                         type="number"
                                         name="ctaCte"
                                         value= "{{ $clie->ctaCte }}"
                                         class="form-control mb-2"
                                     />   
                                 </div>
                                <div class="container text-center row justify-content-center" >
                                   
                                    <button class="btn btn-success mt-3" 
                                            type="submit">
                                          
                                        Editar
                                    </button>
                                </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
