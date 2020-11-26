<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Usuario') }}
        </h2>
    </x-slot>
    <div class="container ">
        <a href="{{route('dashboard')}}" 
                class="btn btn-primary float-right">
                     Volver ...
         </a>
    </div>
    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
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
                                @error('rol')
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
</x-app-layout>