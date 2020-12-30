@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Ingrese Monto Inicial
                        </span>                       
                    </div>
                    <div class="card-body">     
                     
                      <form   action="{{ route('guardarCaja') }}" 
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
                            <div class="container" name="etiquetas">
                            <br>
                            <input
                                type="number"
                                name="monto"
                                placeholder="Monto inicial"
                                class="form-control mb-2"
                            />     
                            </div>
                            <button class="btn btn-success mt-3" 
                                    type="submit">
                                Guardar
                          </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection