@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
</div>
<x-grafica img="/Storage/caja.jpg"/>
  <br>

<table class= "table">
    <th>
    </th>
</table>

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-4">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Apertura Caja
                        </span>                       
                    </div>
                    <div class="card-body">     
                     
                      <form   action="{{ route('caja.store') }}" 
                              method="POST"
                              enctype= "multipart/form-data"
                              >
                        @csrf
                            <div class="container" name= "errores">
                                @error('monto')
                                <div class="alert alert-success">
                                    Monto obligatorio
                                </div>
                                @enderror
                            </div>
                            <div class="container row justify-content-center" name="etiquetas">
                            <br>
                            <input
                                type="number"
                                name="monto"
                                placeholder="Monto inicial"
                                class="form-control mb-2 col-6 "
                            />    
                            
                            </div>
                            <div class="container col-md-4 justify-content-center">
                                <button class="btn btn-success mt-2 shadow" 
                                        type="submit">
                                    Guardar
                                </button>
                            </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection