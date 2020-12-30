@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent


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
                            @error('precio')
                              <div class="alert alert-success">
                                  Precio obligatorio
                              </div>
                            @enderror
                           
                            @error('proveedors_id')
                              <div class="alert alert-success">
                                Proveedor obligatorio
                              </div>
                            @enderror
                        </div>
                        <div class="container" name="etiquetas">
                          <input
                            type="text"
                            name="nombre"
                            placeholder="Nombre"
                            class="form-control mb-2"
                          />                  
                          <input
                            type="number"
                            name="cantidad"
                            placeholder="Cantidad"
                            class="form-control mb-2"
                          />
                          <input
                            type="number"
                            name="precioCompra"
                            placeholder="Precio de Compra"
                            class="form-control mb-2"
                          />
                          <input
                            type="number"
                            name="iva"
                            placeholder="IVA"
                            class="form-control mb-2"
                          />
                          <input
                            type="number"
                            name="precioVenta"
                            placeholder="Precio de Venta"
                            class="form-control mb-2"
                          />
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
                                <select class="custom-select mr-sm-2" 
                                        id="categorias_id" 
                                        name= "categorias_id">
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
                                  <br>
                                
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
                                                  
                          <button class="btn btn-success mt-3" 
                                  type="submit">
                                    Agregar
                          </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection