@extends('layouts.app')

@section('content')


  <x-header titulo="Categorías" />  

    <div class="container mt-3 ">
        <div class="row justify-content-center ">
            <div class="col-md-5">
                <div class="card bg-white shadow">
        {{-- 
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            Agregar
                        </span>                       
                    </div> --}}
                    {{-- 
                    <div class="card-header ">
                        <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center ">
                          <span class="text-center mx-auto font text-2xl ">
                            <h3>
                              Agregar
                            </h3>
                          </span>
                        </div>
                      </div> 
 --}}
                      <div class="card shadow">
                        <div class=" py-3 px-8 cart2">
                                <h3>
                                    Agregar 
                                </h3>
                        </div>
                    <div class="card-body">     
                     
                      <form   action="{{ route('categorias.store') }}" 
                              method="POST"
                              enctype= "multipart/form-data"
                              >
                        @csrf
                            <div class="container  mx-auto" name= "errores">
                                @error('nombre')
                                <div class="alert alert-success row justify-content-center">
                                    Nombre obligatorio
                                </div>
                                @enderror
                            </div>
                            <div    class="container text-center row justify-content-center" 
                                    name="etiquetas">
                                <br>
                                <input
                                    type= "text"
                                    name= "nombre"
                                    placeholder= "Nombre"
                                    class= "form-control mb-2 col-6 "
                                />     
                            </div>
                            <div class="container text-center row justify-content-center" >
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