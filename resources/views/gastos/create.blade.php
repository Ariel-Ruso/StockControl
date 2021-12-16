@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
</div>
    {{-- <x-grafica img="/Storage/facturas.png"/> --}}
    <h2>
      Gastos
    </h2>
    <br>
    <table class= "table">
        <tr></tr>
    </table>

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-4">
                <div class="card bg-blue shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            <h3>
                                Ingrese Gasto
                            </h3>
                          
                        </span>                       
                    </div>
                    <div class="card-body">     
                     
                      <form   action="{{ route('gastos.store') }}" 
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
                                type="text"
                                name="detalle"
                                placeholder="Detalle"
                                class="form-control mb-2 col-6 m-1 "
                            />    
                            <input
                                type="number"
                                name="monto"
                                placeholder="Monto "
                                class="form-control mb-2 col-6 "
                            /> 
                            
                            </div>
                            <div class="container col-6 justify-content-right">
                                <button class="btn btn-success mt-5 align-right shadow" 
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

    <script>
        if (window.history.replaceState) { // verificamos disponibilidad
            window.history.replaceState(null, null, window.location.href);
        }
    
    </script>

@endsection