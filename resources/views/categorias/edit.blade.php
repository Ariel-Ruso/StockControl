@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
  </div>
  <x-grafica img="/Storage/categ.jpg"/>
  <br>
  
  <table class= "table">
      <th>
      </th>
  </table>

    <div class="container mt-3 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                    <span class="text-center mx-auto font text-2xl">
                            Categoria # {{ $cate-> id }}
                        </span>                   
                    </div>
                    <div class="card-body">     
                      <form   action="{{ route('categorias.update', $cate->id) }}" 
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

                            <div class="container" name="etiquetas">
                            <br>
                                <label > 
                                    Nombre:          
                                </label>
                                    <input
                                        type="text"
                                        name="nombre"
                                        value= "{{ $cate->nombre }}"
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