@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

<div class="container mt-15 ">
    <div class="row justify-content-center ">
        <div class="col-md-8 bg-blue-200">
            <div class=" rounded px-8 pt-4 pb-4">
                <form action=" {{ route('importarCsv') }} " method="POST"
                        enctype= "multipart/form-data" >
                    @csrf

                    <input type="file" name="csv_file" require>

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
                    <button class="btn btn-outline-success" type="submit">
                        Importar CSV
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection