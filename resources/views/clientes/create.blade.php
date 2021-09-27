@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
  </div>
<x-grafica img="/Storage/clientes.png"/>

<br><br>
<table class= "table mt-1">
    <th>
    </th>
</table>
@component('components.carrito-btn')
@endcomponent


    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-5">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Agregar Cliente
                        </span>                       
                    </div>
                    <div class="card-body">     
                     
                      <form   action="{{ route('clientes.store') }}" 
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
                                @error('direccion')
                                <div class="alert alert-success row justify-content-center">
                                    Dirección obligatoria
                                </div>
                                @enderror
                                @error('dni')
                                <div class="alert alert-success row justify-content-center">
                                    Dni duplicado o faltante
                                </div>
                                @enderror
                                {{-- @error('cuit')
                                <div class="alert alert-success row justify-content-center">
                                    CUIT obligatorio
                                </div>
                                @enderror --}}
                               {{--  @error('email')
                                <div class="alert alert-success row justify-content-center">
                                    Email obligatorio 
                                </div> 
                                @enderror--}}
                               {{--  @error('telefono')
                                <div class="alert alert-success row justify-content-center">
                                    Teléfono obligatorio
                                </div>
                                @enderror --}}
                            </div>
                            <div class="container " name="etiquetas">
                                <div class="row justify-content-center ">
                                    <div class="col-md-8 ">
                                        <input
                                            type= "text"
                                            name= "dni"
                                            placeholder= "Dni"
                                            value= "{{ old('dni') }}"
                                            class= "form-control mb-2  "
                                        /> 
                                        <input
                                            type= "text"
                                            name= "cuit"
                                            placeholder= "CUIT"
                                            value= "{{ old('cuit') }}"
                                            class= "form-control mb-2  "
                                        /> 
                                        <input
                                            type= "text"
                                            name= "email"
                                            placeholder= "Email"
                                            value= "{{ old('email') }}"
                                            class= "form-control mb-2  "
                                        /> 
                                        <input
                                            type= "text"
                                            name= "nombre"
                                            placeholder= "Nombre"
                                            value= "{{ old('nombre') }}"
                                            class= "form-control mb-2 "
                                        />                             
                                        <input
                                            type= "text"
                                            name= "direccion"
                                            placeholder= "Dirección"
                                            value= "{{ old('direccion') }}"
                                            class= "form-control mb-2  "
                                        />  
                                        <input
                                            type= "text"
                                            name= "telefono"
                                            placeholder= "Teléfono"
                                            value= "{{ old('telefono') }}"
                                            class= "form-control mb-2  "
                                        />     
                                    </div>
                                </div>
                            </div>
                            <div class="container text-center row justify-content-center" >
                                <button class="btn btn-success mt-3 " 
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