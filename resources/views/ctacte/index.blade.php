@extends('layouts.app')

@section('content')
<div class="float-right">
  @component('components.botones')
  @endcomponent
  <br>
  </div>
  
  <h2>
    Cuenta Corriente
  </h2>
  <br><br>

  <table>
    <td></td>
  </table>
  <br>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!--Incluir jquery y libreria para el calendario y su traduccion al español-->
  {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> --}}

  <script>
    /* Inicialización en español para la extensión 'UI date picker' para jQuery. */
    /* 
    jQuery(function($){
        $.datepicker.regional['es'] = {
          closeText: 'Cerrar',
          prevText: '<Ant',
          nextText: 'Sig>',
          currentText: 'Hoy',
          monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                      'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
          monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                          'Jul','Ago','Sep','Oct','Nov','Dic'],
          dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
          dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
          dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
          weekHeader: 'Sm',
          dateFormat: 'dd/mm/yy',
          firstDay: 1,
          isRTL: false,
          showMonthAfterYear: false,
          yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['es']);
    }); */
    </script>
{{-- 
<script language="javascript" type="text/javascript">
  var jQ = jQuery.noConflict();
  jQ(document).ready(function() {

        jQ( "#fechai" ).datepicker({
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 1,
          dateFormat: "yy/mm/dd",
          altField: "#desde",
          altFormat: "yymmdd"
        });
        
        jQ( "#fechaf" ).datepicker({
          changeMonth: true,
          changeYear: true,
          numberOfMonths:1,
          dateFormat: "yy/mm/dd",
          altField: "#hasta",
          altFormat: "yymmdd"
        });
      });
</script> --}}
 {{-- 
<br>
<table class= "table">
  <tr>
    <th class="container mt-3 col-md-4">
      
        <label class="alert alert-primary border shadow ml-2" >
        <nav class="d-flex navbar navbar-light float-right tablet: d-flex flex-col-5">
          <form  class="form-inline col-auto " action="{{ route('buscaContable') }}" >
              <input    name="nombre" 
                        id= "nombre"
                        class="form-control mr-sm-2 col-3" 
                        type="search" 
                        placeholder="Nombre - Apellido" 
                        aria-label="Search"
                        >
              <input    name="dni" 
                        id= "dni"
                        class="form-control mr-sm-2 col-2" 
                        type="search" 
                        placeholder="Dni - cuit " 
                        aria-label="Search"
                        >
              
              <input    name="precioi" 
                        id= "precioi"
                        class="form-control mr-sm-2 col-3 ml-6" 
                        type="search" 
                        placeholder="Monto Mínimo" 
                        aria-label="Search"
                        >
              <input    name="preciof" 
                        id= "preciof"
                        class="form-control mr-sm-2 col-3" 
                        type="search" 
                        placeholder="Monto Máximo" 
                        aria-label="Search"
                        >

              <br><br><br>
              
              <label class= "mt-2 mx-6">
                Desde
              </label>

              <input  id="fechai" 
                      type="search" 
                      name="fechai" 
                      class="form-control mr-sm-2 col-3 "
                      autocomplete="off">
             
                <label class= " mx-6">
                  Hasta
                </label>
              <input  id="fechaf" 
                      type="search" 
                      name="fechaf" 
                      autocomplete="off"
                      class="form-control mr-sm-2 col-3" >
                            
            <button class="btn btn-success sm shadow" 
                    type="submit" 
                    >
                          Buscar
                  </button>
        </nav><br><br>
      </label>

    </th>

    <th class="container mt-3 col-md-2">
     
    </th>
  </tr>
</table>
<br>
  --}}
<!-- si vuelve vacio -->
@if($ctas->count()>0)
    
      <!-- si hay resultado armo tabla --> 
      
  <div class="container mt-4">
    <div class="row justify-content-center mx-auto ">
          <table class="table border-rounded shadow" >
            <thead class="table font-normal text-center text-black-500 index" >
              <tr>
                <th scope="col">
                    Operación
                </th> 
                <th scope="col">
                    Nombre Cliente 
                </th>
                <th scope="col">
                    Debe
                </th>
                <th scope="col">
                    Haber
                </th>
                <th scope="col">
                  Fecha
                </th>
                {{-- <th scope="col">
                    Saldo
                </th> --}}
              </thead>
              <tbody>
                @foreach($ctas as $item)
                <tr class="px-2 py-3 text-center text-xs">
                  <td>
                    <a href=" {{ route('contable.show', $item) }}">
                      {{ $item->id }}
                        <i class="fa fa-id-card fa-lg" 
                           aria-hidden="true">
                        </i>
                    </a>

                  </td>
                  
                    <td>    
                        {{ $clie[ $item->clientes_id - 1]->nombre }}
                        {{-- [ $item->id ] --}}
                    </td>
                    <td>
                      @if($item->monto<0)    
                        $ {{ $item->monto }}
                      @endif
                    </td>
                    <td>
                      @if($item->monto>0)    
                        $ {{ $item->monto }}
                      @endif                    
                    </td>
                    <td>
                      {{ $item->created_at->format('d/m/y')  }}
                    </td>

                  </tr>
                @endforeach
              </tbody>
          </table>
    </div>  
  </div>
                    
  
@else
    <br>
     <x-vacio mensaje="Sin cuentas" />


@endif   

  
@endsection





    


