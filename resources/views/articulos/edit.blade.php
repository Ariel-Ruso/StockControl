@extends('layouts.app')

@section('content')
<script type="text/javascript" src="{{ URL::asset('app.js') }}"></script>

<div class="float-right">
  @component('components.botones')
  @endcomponent
</div>
@if(count($imeis)>0)
  <x-grafica img="/Storage/celulares.jpeg" />
@else
  <x-grafica img="/Storage/articulos.jpg" />
@endif
<br><br>
<table class= "table mt-1">
  <th>
  </th>
</table>

  <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            Artículo #{{$arts-> id }}
                        </span>
                    </div>
                    <div class="card-body">     
                      
                      <form  action="{{ route('articulos.update', $arts->id) }}" 
                             method="POST">
                                    @method ('patch')
                                    @csrf
                                    <div class= "container" name="errores">
                                        @error('nombre')
                                          <div class="alert alert-success">
                                              Nombre obligatorio
                                          </div>
                                        @enderror
                                        @error('cantidad')
                                          <div class="alert alert-success">
                                              Cantidad obligatoria
                                          </div>
                                        @enderror
                                        @error('precioCompra')
                                          <div class="alert alert-success">
                                              Precio Compra obligatorio
                                          </div>
                                        @enderror
                                        @error('proveedors_id')
                                          <div class="alert alert-success">
                                            Proveedor obligatorio
                                          </div>
                                        @enderror
                                        @error('categorias_id')
                                          <div class="alert alert-success">
                                            Categoria obligatoria
                                          </div>
                                        @enderror
                                    </div> 
                        
                          <div class="container text-left">
                            <label for="Nombre"> 
                                Nombre:          
                            </label><br>
                            <!-- value= "{{ isset ($arts->nombre) ? $arts->nombre:'' }}" -->
                            <div class="container row justify-content-center ">
                            <input
                              type="text"
                              name= "nombre"
                              value= "{{ $arts->nombre }}"
                              class="form-control mb-2 text-center "
                            />    
                            </div>
                            
                            <label > 
                                Codigo:
                            </label>     
                            <div class="container row justify-content-center ">        
                              <input
                                  type="number"
                                  name="codigo"
                                  value= "{{ $arts->codigo }}"
                                  class="form-control mb-2 col-4 text-center"
                              />
                            </div>
                            <label > 
                                Cantidad:
                            </label>     
                            <div class="container row justify-content-center ">        
                              <input
                                  type="number"
                                  {{-- readonly --}}
                                  name="cantidad"
                                  value= "{{ $arts->cantidad }}"
                                  class="form-control mb-2 col-4 text-center"
                              />
                            </div>
                            {{-- @if(isset($imeis)) --}}
                            @if(count($imeis)>0)
							
                            <label > 
                              Imeis Disponibles:
                            </label>
                            <div class="container row justify-content-center ">
                              @foreach ( $imeis as $imei) 
                                                
                                {{ $imei->detalle }}
                                <br>
              
                              @endforeach 
                            </div>
              
                          @endif
                        <label > 
                          Precio Venta Efectivo: 
                        </label>
                        <div class="container row justify-content-center ">
                         <input
                            type= "number"
                            name="precioVenta"
                            value=  "{{ $arts->precioVenta }}"
                            class="form-control mb-2 col-4 text-center"
                        />
                        </div>
                        <label > 
                          Precio Venta Tarjeta: 
                        </label>
                        <div class="container row justify-content-center ">
                         <input
                            type= "number"
                            name= "pVentaTarj"
                            value=  "{{ $arts->pVentaTarj }}"
                            class="form-control mb-2 col-4 text-center"
                        />
                        </div>
                        <label > 
                          Marca 
                        </label>
                        <div class="container row justify-content-center ">
                         <input
                            type= "text"
                            name= "marca"
                            value=  "{{ $arts->marca }}"
                            class="form-control mb-2 col-6 text-center"
                        />
                        </div>
                        <label > 
                          Modelo 
                        </label>
                        <div class="container row justify-content-center ">
                         <input
                            type= "text"
                            name= "modelo"
                            value=  "{{ $arts->modelo }}"
                            class="form-control mb-2 col-6 text-center"
                        />
                        </div>
                        @isset($arts->imei)
                          <label > 
                            Imei
                          </label>
                          <div class="container row justify-content-center ">
                          <input
                              type= "text"
                              name= "imei"
                              value=  "{{ $arts->imei }}"
                              class="form-control mb-2 col-6 text-center"
                            />
                          </div>
                          @endisset
                       
                       
                        </div>
                        </div>
     
                      <div class="row justify-content-center">
                        <button class="btn btn-primary mt-3 my-3" 
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
{{-- 
  <script>    
  /* function checkInput(codbar) {
    
    var codbar = document.calc.codbar.value = codbar;
    JsBarcode("#barcode2", codbar);

  }

  */

  $(document).ready.(function(){
      //var codbar = document.calc.codbar.value;
      $("#1").JsBarcode(" Codigo", {
            displayValue: true, 
            fontSize: 20,
      });
    });
--}}
<script>    
    function redondeo( data ){

  var ultdig= data.charAt(data.length-1); 
  var res= Number(ultdig) - 10;
  
  switch ( res ){
    case -1:
      //window.alert( 'Falta 1 para 10');
      falta= 1;
      break;
    case -2:
      falta= 2;
      break;
    case -3:
      falta= 3;
      break;
    case -4:
      falta= 4;
      break;
    case -5:
      falta= 5;
      break;
    case -6:
      falta= 6;
      break;
    case -7:
      falta= 7;
      break;
    case -8:
      falta= 8;
      break;
    case -9:
      falta= 9;
      break;
  }

return (Number (data) + Number (falta) ) ;  
  
}

  </script> 

@endsection
