@extends('layouts.app')

@section('content')

<x-header titulo="Clientes" />  

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
                <div class="col-md-6">
                    <div class="card shadow">                     
                      <div class=" py-3 px-8 cart2">
                          <h3>
                            Cliente # {{ $clie-> id }}
                          <h3>
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
                                             type="float"
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
