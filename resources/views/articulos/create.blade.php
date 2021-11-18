@extends('layouts.app')

@section('content')

<div class="float-right">
  @component('components.botones')
  @endcomponent
</div>
<x-grafica img="/Storage/articulos.jpg" />

<br><br>
<table class= "table mt-1">
  <th>
  </th>
</table>
{{-- <x-agrega-btn route="/celulares/create" destino="Celulares" /> --}}

<script type="text/javascript" src="{{ URL::asset('js/logica.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

<div class="container mt-10 ">
  <div class="row justify-content-center ">
    <div class="col-md-6">
      <div class="card bg-white shadow">
        <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
          <span class="text-center mx-auto font text-2xl">
            Agregar
          </span>
        </div>
        <div class="card-body">

          <form action="{{ route('articulos.store') }}" 
                method="POST" 
                enctype="multipart/form-data" 
                name="calc">
            @csrf

            <div class="container row justify-content-center" name="errores">
              @error('nombre')
              <div class="alert alert-success">
                Nombre obligatorio
              </div>
              @enderror
              @error('codigo')
              <div class="alert alert-success">
                Codigo obligatorio
              </div>
              @enderror
              @error('cantidad')
              <div class="alert alert-success">
                Cantidad obligatorio
              </div>
              @enderror
              @error('precioCompra')
              <div class="alert alert-success">
                Precio Compra obligatorio
              </div>
              @enderror
              <!-- @error('pVentaTarj')
                              <div class="alert alert-success">
                                  Precio Venta obligatorio
                              </div>
                            @enderror -->

              @error('iva')
              <div class="alert alert-success">
                Iva obligatoria
              </div>
              @enderror
              @error('ganancia')
              <div class="alert alert-success">
                Ganancia obligatoria
              </div>
              @enderror
              @error('marca')
              <div class="alert alert-success">
                Marca obligatoria
              </div>
              @enderror
              @error('modelo')
              <div class="alert alert-success">
                Modelo obligatoria
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

            <div class="container " name="etiquetas">
              <div class="row justify-content-center ">
                <div class="col-md-8 ">

                  <select class="custom-select mr-sm-2" id="categorias_id" name="categorias_id">
                    <br>
                    <option selected>
                      Categorias...
                    </option>
                    @foreach($cates as $item)
                    <option value="{{ $item->id }}">
                      {{ $item->nombre }}
                    </option>
                    @endforeach
                  </select>
                  <br>
                <label>
                    N° Id
                  </label>
                  <input readonly type="number" name="id" value={{ $ultArt->id + 1}} class="form-control mb-2 col-4 " />
                  <label>
                    N° Código
                  </label>
                  <input type="number" name="codigo" value={{ $ultArt->codigo + 1}} class="form-control mb-2 col-4 " />
                  <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2 " />
                  <input type="text" name="descripcion" placeholder="Descripción" class="form-control mb-2" />
                  <input type="text" name="marca" placeholder="Marca" class="form-control mb-2" />
                  <input type="text" name="modelo" placeholder="Modelo" class="form-control mb-2" />
                  <input type="number" name="cantidad" placeholder="Cantidad" class="form-control mb-2 col-5" />
                  
                  
                  <label class="alert alert-info " for="">
                    <label for="">
                      Precio de Compra
                    </label>
                    <input  type="number" id="precioCompra" name="precioCompra" 
                            placeholder="Precio Compra" class="form-control mb-2" 
                            onchange="checkInput('precioCompra');" />
                   
                    <label for="">
                      Precio Venta Efectivo
                    </label>
                    <input  type="double" name="precioVenta" value= "" 
                            placeholder="Precio Venta Efectivo" class="form-control mb-2 " 
                            onchange="checkInput('precioVenta');" />
                   
                    <label for="">
                      % Ganancia 
                    </label>
                    <br>
                    {{-- <input type="number" id="ganancia" name="ganancia" value="" placeholder="" class="form-control mb-2 col-4"  /> --}}
                    <input type="float(0.1)" step="any" id="ganancia" readonly name="ganancia" value="0.0" 
                          placeholder="" class="form-control mb-2 col-6"  /> 
                   
                    <label for="">
                      IVA %
                    </label>
                   <br>
                    <select class="custom-select mr-sm-2 col-5" 
                            id="color" name="iva" onchange="checkInput('precioCompra');">
                    <br>
                    <option selected>
                      21 
                    </option>
                    <option value="10.5">10,5 </option>
                    <option value="10.5">NO</option>
                  </select>

                    <label for="">
                      Impuesto Tarjeta %
                    </label>
                    <input type="number" id="tarjeta" value="18" name="tarjeta" placeholder="18" class="form-control mb-2 col-4" onchange="checkInput('precioVenta');" />
                    <label for="">
                      Precio Venta Tarjeta
                    </label>
                    <input type="double" name="pVentaTarj" placeholder="Precio Venta Tarjeta" class="form-control mb-2" />
                  </label>

                  </label>
                    <div class="form-row align-items-center">
                      <div class="col-auto my-1">
                        <svg id="barcode2"></svg>
                        <input type="text" name="codbar" placeholder="Codigo de Barras" class="form-control mb-2" />
                        <button type="button" onclick="randomInt();" class="btn btn-secondary">Generar
                        </button><br><br>
                       
                        <br>
                      </div>
                    </div>

                  <div class="form-row align-items-center">
                    <div class="col-auto my-1">
                      <select class="custom-select mr-sm-2" id="proveedors_id" name="proveedors_id">
                        <option selected>
                          Proveedores...
                        </option>
                        @foreach($proves as $item2)
                        <option value="{{ $item2->id }}">
                          {{ $item2->nombre }}
                        </option>
                        @endforeach
                      </select>
                      <br>
                    </div>
                  </div>
                  <!-- <form>
                                  <div class="form-group">
                                    <label for="exampleFormControlFile1">
                                        Seleccione imagen
                                      </label>
                                    <input  type="file" 
                                            class="form-control-file" 
                                            id="imagen"
                                            name= "imagen">   
                                  </div> 
                                </form>-->
                  <div class="row justify-content-center ">
                    <button class="btn btn-success mt-3 " type="submit">
                      Agregar
                    </button>
                  </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
  
<script>
  window.onload = randomInt();

  function checkInput(precioCompra) {

    var Precio = document.calc.precioCompra.value;
    var pre = document.calc.precioVenta.value;
    var gano = pre- Precio;
    var gano1 = Number (gano / Precio);
    var ganof = Number (gano1 * 100);
    
    document.calc.ganancia.value = ganof;

    var finaltarjeta = Number (pre * 0.18 ) + Number (pre);

    document.calc.pVentaTarj.value = Math.round(finaltarjeta);
    document.calc.pVentaTarj.value = redondeo2 (document.calc.pVentaTarj.value);
    
  }

 /*  function checkInput(precioVenta){

    document.calc.precioVenta.value= redondeo2 ( document.calc.precioVenta.value );

  } */

  
function redondeo2( data ){

  var ultdig= data.slice(-2); 
  var resto= data-ultdig;
  
  //var res= Number(ultdig) - 10;
  if(Number (ultdig < 50 )) {
    //window.alert( '1 rango');
    res= 50;
    }else{
    //window.alert( '2 rango');
      res= 90;
    }

  return ( resto + Number (res));


/* switch ( res ){
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
} */

//return (Number (data) + Number (falta) ) ;  

}


  function randomInt() {
    var codbar = Math.round(Math.random() * 10) * 154657897987 * 1375;
    document.calc.codbar.value = codbar;
    JsBarcode("#barcode2", codbar);

  }
</script>

@endsection