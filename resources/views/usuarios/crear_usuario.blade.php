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
                        <img src="Storage/user.png" height="700" width="600" >
                    </div>
            </div>      
</div>    

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between 
                    align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Agregar Usuario
                        </span>                       
                    </div>
                    <div class="card-body">     
                      @if ( session('mensaje') )
                        <div class="alert alert-success">
                            {{ session('mensaje') }}  
                        </div>
                      @endif
                      <form   action="{{ route('crear_usuario2') }}" 
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
                                @error('password')
                                    <div class="alert alert-success">
                                        Password obligatorio
                                    </div>
                                @enderror
                                @error('direccion')
                                    <div class="alert alert-success">
                                        Direccion obligatoria
                                    </div>
                                @enderror
                                @error('correo')
                                    <div class="alert alert-success">
                                        Correo obligatorio
                                    </div>
                                @enderror
                                @error('rols_id')
                                    <div class="alert alert-success">
                                        Rol obligatorio
                                    </div>
                                @enderror
                            </div>
                            <div class="container" name="etiquetas">
                            <br>
                                <input
                                    type="text"
                                    name="nombre"
                                    placeholder="Nombre Usuario"
                                    class="form-control mb-2"
                                />     
                                <input
                                    type="password"
                                    name="password"
                                    placeholder="Password Usuario"
                                    class="form-control mb-2"
                                />     
                                <input
                                    type="text"
                                    name="correo"
                                    placeholder="Correo de Usuario"
                                    class="form-control mb-2"
                                />  
                                <input
                                    type="text"
                                    name="direccion"
                                    placeholder="Direccion"
                                    class="form-control mb-2"
                                />                             
                              <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" 
                                        id="inlineFormCustomSelect" 
                                        name= "rols_id">
                                  <option selected>
                                    Roles..
                                  </option>
                                  @foreach($rols as $item)
                                    <option value= "{{$item->id}}" >
                                      {{ $item->nombre }}
                                    </option>
                                  @endforeach
                                </select>
                                <br>
                              </div>
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