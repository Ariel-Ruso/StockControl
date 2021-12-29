@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
  </div>
    {{-- <x-grafica img="/Storage/prove.jpg"/> --}}
    <h2>
        Proveedores
    </h2>
    <br><br>
      
  <table class= "table">
      <th>
      </th>
  </table>
  
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card 
        {{-- bg-white  --}}
         shadow">
          <div class=" py-3 px-8 cart2
          {{-- bg-blue-200 d-flex justify-content-between align-items-center --}}
          ">
            {{-- <span class="text-center mx-auto font text-xl"> --}}
              <h3>
                Proveedor # {{ $prove-> id }}
              <h3>
            {{-- </span>						 --}}
          </div>
                    <div class="card-body">     
                      <form   action="{{ route('proveedores.update', $prove->id) }}" 
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
                                @error('telefono')
                                <div class="alert alert-success">
                                    Telefono obligatorio
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
                            <label > 
                                Nombre:          
                            </label>
                                <input
                                    type="text"
                                    name="nombre"
                                    value= "{{ $prove->nombre }}"
                                    class="form-control mb-2"
                                />     
                            <label > 
                                Contacto:          
                            </label>
                                <input
                                    type="text"
                                    name="contacto"
                                    value= "{{ $prove->contacto }}"
                                    
                                    class="form-control mb-2"
                                /> 
                            <label > 
                                Correo:          
                            </label> 
                                <input
                                    type="text"
                                    
                                    name="correo"
                                    value= "{{ $prove->correo }}"
                                    class="form-control mb-2"
                                />
                            <label > 
                                Teléfono:          
                            </label>  
                                <input
                                    type="text"
                                    
                                    name="telefono"
                                    value= "{{ $prove->telefono }}"
                                    class="form-control mb-2"
                                /> 
                            <label > 
                                Dirección:          
                            </label> 
                                <input
                                    type="text"
                                    name="direccion"
                                    
                                    value= "{{ $prove->direccion }}"
                                    class="form-control mb-2"
                                />  
                            </div>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary mt-3 my-3" 
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