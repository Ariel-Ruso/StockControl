@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Agregar Proveedor
                        </span>                       
                    </div>
                    <div class="card-body">     
                    
                      <form   action="{{ route('crear_proveedor2') }}" 
                              method="POST"
                              enctype= "multipart/form-data"
                              >
                        @csrf
                            <div class="container" name= "errores">
                                @error('nombre')
                                <div class="alert alert-success">
                                    Nombre obligatorio
                                </div>
                                @enderror
                                @error('correo')
                                <div class="alert alert-success">
                                    Correo obligatorio
                                </div>
                                @enderror
                                @error('contacto')
                                <div class="alert alert-success">
                                    Contacto obligatorio
                                </div>
                                @enderror
                                @error('direccion')
                                <div class="alert alert-success">
                                    Direccion obligatoria
                                </div>
                                @enderror
                            </div>
                            <div class="container" name="etiquetas">
                            <br>
                                <input
                                    type="text"
                                    name="nombre"
                                    placeholder="Nombre Empresa"
                                    class="form-control mb-2"
                                />     
                                <input
                                    type="text"
                                    name="correo"
                                    placeholder="Correo de Empresa"
                                    class="form-control mb-2"
                                />  
                                <input
                                    type="text"
                                    name="contacto"
                                    placeholder="Nombre Contacto"
                                    class="form-control mb-2"
                                />  
                                <input
                                    type="text"
                                    name="direccion"
                                    placeholder="Direccion"
                                    class="form-control mb-2"
                                />  
                            </div>
                            <button class="btn btn-success mt-3" 
                                    type="submit">
                                Agregar
                          </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection