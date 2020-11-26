<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Editar articulo') }}
      </h2>
  </x-slot>
  <div class="container ">
        <a href="{{route('mostrarTodosArt')}}" 
            class="btn btn-primary float-right ">
              Volver ...
         </a>
  </div>

  <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            Articulo # {{$arts-> id }}
                        </span>
                    </div>
                    <div class="card-body">     
                      @if ( session('mensaje') )
                        <div class="alert alert-success">
                            {{ session('mensaje') }}
                        </div>
                      @endif
                      
                      <form  action="{{ route('actualizar_articulo', $arts->id) }}" 
                             method="POST">
                                    @method ('put')
                                    @csrf
                                    <div name="errores">
                                      @error('nombre')
                                        <div class="alert alert-success">
                                          Nombre obligatorio
                                        </div>
                                      @enderror
                                    </div>
                         <label for="Nombre"> 
                            Nombre:          
                         </label>
                        <input
                          type="text"
                          name="nombre"
                          placeholder= "{{ $arts->nombre }}"
                          class="form-control mb-2"
                        />    
                        <label for="Cantidad"> 
                            Cantidad:
                        </label>              
                        <input
                          type="text"
                          name="cantidad"
                          placeholder= "{{ $arts->cantidad }}"
                          class="form-control mb-2"
                        />
                        <label for="Precio"> 
                          Precio: 
                        </label> 
                        $ <input
                          type="text"
                          name="precio"
                          placeholder= "{{ $arts->precio }}"
                          class="form-control mb-2"
                        />
                          <div class="form-row align-items-center">
                            <div class="col-auto my-1">
                              <label class="mr-sm-2" for="inlineFormCustomSelect">
                                  Categorias
                                </label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name= "cates">
                                <option selected>
                                    {{ $cates[ ($arts->categorias_id)-1 ]->nombre }}
                                </option>
                                @foreach($cates as $item)
                                  <option value= "{{ $item->id }}" >
                                    {{ $item->nombre }}
                                  </option>
                                @endforeach
                              </select>
                              <br><br>
                              <div class="col-auto my-1">
                              <label class="mr-sm-2" for="inlineFormCustomSelect">
                                  Proveedores
                                </label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name= "proves">
                                <option selected>
                                    
                                    {{ $proves[ ($arts->proveedors_id)-1 ]->nombre }}
                                </option>
                                @foreach($proves as $item2)
                                  <option value= "{{ $item2->id }}" >
                                    {{ $item2->nombre }}
                                  </option>
                                @endforeach
                              </select>
                              <br><br>
                          </div>
                        <button class="btn btn-primary btn-block mt-3" 
                                type="submit">
                                    Editar
                        </button>
                      </form>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer mt5">
      .
      </div>

</x-app-layout>
