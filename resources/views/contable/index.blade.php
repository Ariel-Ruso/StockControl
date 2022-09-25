@extends('layouts.app')

@section('content')

    <x-header titulo="Contable" />  

    {{-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
      <script src="jquery.ui.datepicker-es.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
    --}}
    {{-- 
      <script>
        $(function () {
          
          $("#fechai").datepicker({
                language: 'es',
                format: 'yyyy/MM/dd'
            });
      });
      $(function () {
          
          $("#fechaf").datepicker();
      }); 
      
      </script>
    --}}
    {{-- Para estilos de calendario  --}}
    {{-- <link href="https://dl.dropboxusercontent.com/s/vlpbj1w2e5ty7i7/jquery.sidr.dark.css?dl=0" rel="stylesheet" /> --}}

    {{-- <link href="https://dl.dropboxusercontent.com/s/sgzcu4kvh9brayv/jquery-ui-1.10.2.css?dl=0" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" /> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--Incluir jquery y libreria para el calendario y su traduccion al español-->
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> --}}

    <script>
      /* Inicialización en español para la extensión 'UI date picker' para jQuery. */
  
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
      });
      </script>

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
    </script>

  
    <table class="search" name="busqueda">
      <tr>
        
        <th class="container mt-3 col-md-2">
        
        </th>

        <th class="container col-md-6">
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
                            placeholder="Precio Mínimo" 
                            aria-label="Search"
                            >
                  <input    name="preciof" 
                            id= "preciof"
                            class="form-control mr-sm-2 col-3" 
                            type="search" 
                            placeholder="Precio Máximo" 
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
                {{--  <input    name="fechai" 
                            id= "fechai"
                            class="form-control mr-sm-2 col-2 " 
                            type="search" 
                            placeholder="dd/mm/aa" 
                            aria-label="Search"
                            > --}}
                    <label class= " mx-6">
                      Hasta
                    </label>
                  <input  id="fechaf" 
                          type="search" 
                          name="fechaf" 
                          autocomplete="off"
                          class="form-control mr-sm-2 col-3" >
                  {{-- <input    name="fechaf" 
                            id= "fechaf"
                            
                            type="search" 
                            placeholder="dd/mm/aa" 
                            aria-label="Search"
                  > --}}
                  
                <button class="btn btn-success sm shadow" 
                        type="submit" 
                        >
                              Buscar
                      </button>
            </nav><br>
          </label>

        </th>

        <th class="container col-md-2">

        </th>

      </tr>
    </table>
    

    <!-- si vuelve vacio -->
    @if($cont==0)
        <br>
        <x-vacio mensaje="Sin operaciones" />
    @else
          <!-- si hay resultado armo tabla --> 
          
      <div class="container mt-4">
      <div class="row justify-content-center mx-auto ">
        
            <table class="table border-rounded shadow" >
              <thead class="table-warning font-normal text-center text-black-500 index" >
                <tr>
                  <th scope="col">
                        Operación
                    </th> 
                    <th scope="col">
                      Fecha
                  </th>
                  <th scope="col">
                      Hora
                  </th>
                  <th scope="col">
                      Vendedor
                  </th>
                  <th scope="col">
                      Cliente
                  </th>
                  <th scope="col">
                    DNI
                  </th>
                  <th scope="col">
                      Efectivo  
                  </th>
                  <th scope="col">
                      Tarjetas
                  </th>
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach($facts as $item)
                  <thead>
                    <tr class="font text-xs text-center" width= "100%"> 
                      <tr class="text-center text-xs font-medium text-black-500">
                        <td>  
                          <a href=" {{ route('contable.show', $item) }}">
                            {{ $item->id }}
                              <i class="fa fa-id-card fa-lg" 
                                aria-hidden="true">
                              </i>
                          </a>
                        </td>
                        <th>                                      
                              {{ $item->created_at->format('d/m/y')  }}<br>
                        </th>
                        <th>
                              {{ $item->created_at->format('H : i ')  }}<br>
                        </th>
                        <th>
                              {{  $users[ ($item->users_id)-1]->name }}
                        </th>
                        <th>
                              {{  $item->apellidoyNombre }}
                        </th>
                        <th>
                          {{  $item->dnicliente }}
                          </th>
                        <th>
                            @if($item->tipoPago==1)
                                $ {{  $item->total }}
                                @else
                                $ {{'-' }}
                            @endif
                        </th>
                        <th>
                            @if($item->tipoPago!=1)
                                $ {{  $item->total }}
                                @else
                                $ {{ '-' }}
                            @endif
                        </th>
                      
                      {{--   <th>
                            <a href=" {{ route ('imprimirRemit', $item->id) }}" 
                                class="btn btn-outline-warning" >
                              Ver
                            </a>
                        </th>  --}}

                    </tr>
                    </thead>
                    
                  @endforeach
                </tbody>
              </table>
          </div>        
        </div>
            {{-- {{ $facts->links() }} --}}
      
      <!-- 


  @endif   

  
@endsection





    


