@extends('layouts.app')

@section('content')

<div class="float-right">
  @component('components.botones')
  @endcomponent
</div>
{{-- <x-grafica img="/Storage/articulos.jpg" /> --}}
<h2>
  Artículos
</h2>

<br><br>
<table class= "table mt-1">
  <th>
  </th>
</table>
{{-- <x-agrega-btn route="/celulares/create" destino="Celulares" /> --}}




<div class="container mt-10 ">
  <div class="row justify-content-center ">
    <div class="col-md-6">
      <div class="card shadow ">
        
        <div class="card-header ">
          <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center ">
            <span class="text-center mx-auto font text-2xl ">
              <h3>
                Agregar
              </h3>
            </span>
          </div>
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
              {{-- <div class="alert alert-success">
                Cantidad obligatorio
              </div> --}}
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

                  
                <label>
                    N° Id
                  </label>
                 {{--  @if ($ultArt == 0)
                    <input readonly type="number" name="id" value={{ $ultArt + 1}} class="form-control mb-2 col-4 " />
                  @else --}}
                    <input readonly type="number" name="id" value={{ $ultArt->id + 1}} class="form-control mb-2 col-4 " />
                  {{-- @endif --}}
                  <label>
                    N° Código
                  </label>
                 {{--  @if ($ultArt == 0)
                    <input type="number" name="codigo" value={{ $ultArt + 1}} class="form-control mb-2 col-4 " />
                  @else --}}
                    <input type="number" name="codigo" value={{ $ultArt->codigo + 1}} class="form-control mb-2 col-4 " />
                  {{-- @endif --}}
                  <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2 " />
                  <input type="text" name="descripcion" placeholder="Descripción" class="form-control mb-2" />
                  <input type="text" name="marca" placeholder="Marca" class="form-control mb-2" />
                  <input type="text" name="modelo" placeholder="Modelo" class="form-control mb-2" />
                  <input type="number" name="cantidad" placeholder="Cantidad" value= "0" class="form-control mb-2 col-5" />
                  
                  
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
                        </button><br>
                       
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
                      <br><br>
                      @if (Auth::user()->name == 'Geminis') 
                            
                          <input type="hidden" name="categorias_id" id="categorias_id"
                                  value="{{ $cates[11]->id }}">

                      @else  
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

                      @endif
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
  

@endsection