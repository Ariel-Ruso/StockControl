@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
  </div>
  {{-- <x-grafica img="/Storage/categ.jpg"/> --}}
  <h2>
      Categorías
  </h2>
  <br>
  
  <table class= "table">
        <th class="container col-md-9"  >
        </th>
  </table>

    <div class="container mt-3 ">
        <div class="row justify-content-center ">
            <div class="col-md-5">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            Agregar
                        </span>                       
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