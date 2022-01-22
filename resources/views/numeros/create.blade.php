@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
  </div>
  {{-- <x-grafica img="/Storage/articulos.jpg"/> --}}
  <h2>
    Artículos
  </h2>
  <br>
  
  <table class= "table">
        <th class="container col-md-9"  >
        </th>
  </table>

    <div class="container mt-3 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" cart2 py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            <h3>
                                {{ $nombre }} - Agregar {{ $cant }} Pares 
                            </h3>
                            
                        </span>                       
                    </div>
                    <div class="card-body">     
                        
                            <form   action="{{ route('numeros.store') }}" 
                                    method="POST"
                                    enctype= "multipart/form-data"
                                    >
                                @csrf
                                    <div class="container  mx-auto" name= "errores">
                                        @error('detalle')
                                        <div class="alert alert-success row justify-content-center">
                                            Detalle obligatorio
                                        </div>
                                        @enderror
                                    </div>
                               
                                    @for($i=0; $i< $cant; $i++)
          
                                        <div class="border border-dark p-2 m-1 rounded">

                                            <input type="number" name="numero[]"  placeholder= "Numero"
                                                    class="form-control mb-2 col-4" />
                                            <input type="number" name="cantidad[]"  value= "1" placeholder="Cantidad" 
                                                class="form-control mb-2 col-5" readonly/>
                                            <input type="text" name="color[]"  placeholder="Color" 
                                                class="form-control mb-2 col-6" />
                                            
                                        </div>
                                        @endfor
                                    <input
                                        type= "hidden"
                                        name= "id"
                                        value= {{ $id }}
                                        class= "form-control "
                                    />     
                                    <input
                                        type= "hidden"
                                        name= "cant"
                                        value= {{ $cant }}
                                        
                                        class= "form-control"
                                    />     

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