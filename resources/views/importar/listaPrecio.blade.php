@extends('layouts.app')

@section('content')

<div class="container col-md-4" name= "grafica">
            <div class="row justify-content-center ">
                    <div class="container mx-auto ">
                        <img src="/Storage/importar.jpg" height="200" width="300" >
                    </div>
            </div>      
</div>    

@component('components.inicio-btn')
@endcomponent

@component('components.mensajes')
@endcomponent


<div class="container mt-15 ">
    <div class="row justify-content-center ">
        <div class="col-md-6 bg-blue-200 rounded shadow-2xl">
            <div class=" rounded px-8 pt-4 pb-4">
                <form action=" {{ route('importarLista') }} " method="POST"
                        enctype= "multipart/form-data" class= "form-group">
                    @csrf
                    <input type="file" name="csv_file"  require>

                    <div class="container" name= "errores">
                            @error('csv_file')
                                <div class="alert alert-success">
                                    Cargue un Archivo
                                </div>
                            @enderror
                    </div>
                    <!-- 
                    @if ($errors->has('csv_file'))
                            <span class="help-block">
                                <strong>
                                    {{ $errors->first('csv_file') }}
                                </strong>
                            </span>
                    @endif -->
                    <br>
                    <div class="container text-center row justify-content-center" >
                        <button class="btn btn-success border-2 mt-3 " type="submit">
                            Importar Lista
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection