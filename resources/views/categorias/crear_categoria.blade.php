<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categoria  Nueva') }}
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
                          Agregar Categoria
                        </span>                       
                    </div>
                    <div class="card-body">     
                      @if ( session('mensaje') )
                        <div class="alert alert-success">
                            {{ session('mensaje') }}  
                        </div>
                      @endif
                      <form   action="{{ route('crear_categoria2') }}" 
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
                            </div>
                            <div class="container" name="etiquetas">
                            <br>
                            <input
                                type="text"
                                name="nombre"
                                placeholder="Nombre"
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


</x-app-layout>