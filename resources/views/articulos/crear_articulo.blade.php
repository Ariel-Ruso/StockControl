<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articulo  Nuevo') }}
        </h2>
    </x-slot>

    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>
                          Agregar Articulo
                        </span>
                        <a href="{{route('bienvenidos')}}" class="btn btn-primary btn-sm">
                            Volver ...
                        </a>
                    </div>
                    <div class="card-body">     
                      @if ( session('mensaje') )
                        <div class="alert alert-success">{{ session('mensaje') }}</div>
                      @endif
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
                        @error('categorias_id')
                          <div class="alert alert-success">
                              Categoria obligatorio
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
                          name="precio"
                          placeholder="Precio"
                          class="form-control mb-2"
                        />
                          <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                              <select class="custom-select mr-sm-2" 
                                      id="inlineFormCustomSelect" 
                                      name= "categorias_id">
                                <option selected>
                                  Categorias...
                                </option>
                                @foreach($cates as $item)
                                  <option value= "{{$item->id}}" >
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
                                      id="inlineFormCustomSelect" 
                                      name= "proveedors_id">
                                <option selected>
                                  Proveedores...
                                </option>
                                @foreach($proves as $item2)
                                  <option value= "{{$item2->id}}" >
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
                                                
                        <button class="btn btn-primary btn-block" 
                                type="submit">
                          Agregar
                        </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>