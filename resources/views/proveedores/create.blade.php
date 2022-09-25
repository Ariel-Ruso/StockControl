@extends('layouts.app')

@section('content')


  <x-header titulo="Proveedores" />  

  <div class="container mt-10 ">
    <div class="row justify-content-center ">
      <div class="col-md-6">
        <div class="card shadow ">
          
          <div class="card-header ">
            <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center ">
              <span class="text-center mx-auto font text-2xl ">
                <h3>
                  Agregar
                </h3>
              </span>
            </div>
          </div>       
                    <div class="card-body">     
                      <form   action="{{ route('proveedores.store') }}" 
                              method="POST"
                              enctype= "multipart/form-data"
                              >
                        @csrf
                            <div class="container row justify-content-center" name= "errores">
                                @error('nombre')
                                <div class="alert alert-success ">
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
                            <div class="container row justify-content-center" name="etiquetas">
                            <br><br>
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
                                    name="telefono"
                                    placeholder="Teléfono"
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
                                    placeholder="Dirección"
                                    class="form-control mb-2"
                                />  
                                <button class="btn btn-success mt-3 shadow" 
                                    type="submit">
                                Agregar
                          </button>
                            </div>
                            
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection