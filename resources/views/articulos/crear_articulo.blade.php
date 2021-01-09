@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent
<script type="text/javascript" src="{{ URL::asset('js/logica.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Agregar Articulo
                        </span>
                    </div>
                    <div class="card-body">     
                      
                      <form   action="{{ route('crear_articulo2') }}" 
                              method="POST"
                              enctype= "multipart/form-data"
                              name="calc"
                              >
                        @csrf
                        
                        <div class="container" name= "errores">
                            @error('nombre')
                              <div class="alert alert-success">
                                  Nombre obligatorio
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

                        <div class="container" name="etiquetas">
                        <div class="row justify-content-center ">
                            <div class="col-md-8">
                          <input
                            type="text"
                            name="nombre"
                            placeholder="Nombre"
                            class="form-control mb-2"
                          />                
                          <input
                            type="text"
                            name="descripcion"
                            placeholder="Descripcion"
                            class="form-control mb-2"
                          />        
                          <input
                            type="number"
                            name="cantidad"
                            placeholder="Cantidad"
                            class="form-control mb-2"
                          /> 
                            <label class="alert alert-info " for="">
                            <label for="">
                              Precio de compra
                            </label>
                            <input
                              type="number"
                              id="precioCompra"
                              name="precioCompra"
                              placeholder="Precio Compra"
                              class="form-control mb-2"
                              onchange="checkInput('precioCompra');"
                            />
                            <label for="">IVA</label>
                            <input
                              type="double"
                              name="iva"
                              placeholder="21"
                              class="form-control mb-2"
                              onchange="checkInput('precioCompra');"
                            />
                            <label for="">Ganancia</label>
                            <input
                              type="number"
                              id="ganancia"
                              name="ganancia"
                              placeholder="18"
                              class="form-control mb-2"
                              onchange="checkInput('precioCompra');"
                            />
                            <input
                              type="double"
                              name="precioVenta"
                              placeholder="Precio de Venta"
                              class="form-control mb-2"
                            />
                            </label>
                         
                          <input
                            type="text"
                            name="marca"
                            placeholder="Marca"
                            class="form-control mb-2"
                          />
                          <input
                            type="text"
                            name="modelo"
                            placeholder="Modelo"
                            class="form-control mb-2"
                          />
               
                            <div class="form-row align-items-center">
                              <div class="col-auto my-1">
                                <svg id="barcode2"></svg>
                                <input type="text" 
                                  name="codbar"
                                  placeholder="Codigo de Barras"
                                  class="form-control mb-2"
                                />
                                  <button type="button" onclick="randomInt();"
                                      class="btn btn-secondary">Generar
                                  </button><br><br>
                                <select class="custom-select mr-sm-2" 
                                        id="categorias_id" 
                                        name= "categorias_id">
                                        <br></br>
                                  <option selected>
                                    Categorias...
                                  </option>
                                  @foreach($cates as $item)
                                    <option value= "{{ $item->id }}" >
                                      {{ $item->nombre }}
                                    </option>
                                  @endforeach
                                </select>
                                <br>
                              </div>
                            </div>       
      
                            <div class="form-row align-items-center">
                              <div class="col-auto my-1">
                                <select class="custom-select mr-sm-2" 
                                        id="proveedors_id" 
                                        name= "proveedors_id">
                                  <option selected>
                                    Proveedores...
                                  </option>
                                  @foreach($proves as $item2)
                                    <option value= "{{ $item2->id }}" >
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
                                                  
                          <button class="btn btn-success mt-3 " 
                                  type="submit">
                                    Agregar
                          </button>
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
function checkInput(precioCompra) { 
    var Precio = document.calc.precioCompra.value; 
    var iva = document.calc.iva.value; 
    var gano = document.calc.ganancia.value; 

    var pre = document.calc.precioVenta.value = Precio * iva /100 ;
    var renta = document.calc.precioVenta.value = Precio * gano /100 ;
    var final = Number(Precio) + Number(pre) + Number(renta);
      document.calc.precioVenta.value = final ;

}

function randomInt() {
  var codbar =  Math.round(Math.random()*10) * 154657897987 * 1375;
  document.calc.codbar.value = codbar ;
  JsBarcode("#barcode2", codbar);

}
</script>

@endsection