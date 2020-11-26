<x-app-layout>
<br>
    <x-slot name="header">
    <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                    {{ __('Articulos para Vender') }}
            </h2> 
    </div>
    </x-slot>
    <!-- espacio para mensajes -->
    <div class="col-md-4 mx-auto">
        <div class="alert alert-success mt-3">
            @if (session('mensaje'))
                {{ session( 'mensaje' ) }}        
            @endif
            <!-- link hasta carrito  -->
            <a  href=" {{ route ('verCarrito') }}"
                class="badge badge-success"> 
                    Ver carrito 
            </a>
        </div>
    </div>
    
<div class="container mt-10" name="busqueda" >
  <nav class="navbar navbar-light float-right">
    <form   class="form-inline"
              action="{{ route('mostrarxCate') }}"
              >
              <select   class="form-control" 
                        id="inlineFormCustomSelect" 
                        name= "categorias">
                            <option selected>
                                    Categorias...
                            </option>
                            @foreach($cates as $item)
                                <option value= "{{ $item->id }}" >
                                    {{ $item->nombre }}
                                </option>
                            @endforeach
                </select>
        <button class="btn btn-outline-success my-2 my-sm-0" 
                type="submit" 
                >
                    Buscar
        </button>
    </form>

    <form  class="form-inline" action="{{ route('buscaPorAr') }}" >
          <select class="form-control" 
                  id="select_busq" 
                  name= "tipo">
                    <option selected>
                      Busca por
                    </option>
                    <option value="nombre">Nombre</option>
                    <option value="cantidad">Cantidad</option>
                    <option value="precio">Precio</option>
          </select>
          <input  name="buscarPor" 
                  class="form-control mr-sm-2" 
                  type="search" 
                  placeholder="Texto" 
                  aria-label="Search"
                  >
          <button class="btn btn-outline-success my-2 my-sm-0" 
                  type="submit" 
                  >
                     Buscar
            </button>
    </form>
      
  </nav><br><br>
</div>
<!-- 
    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-red-300 d-flex justify-content-between align-items-center">
                            <span class="text-center mx-auto font text-2xl">
                                Articulos
                            </span>
                        </div> 
 
                        <div class="row">
                            @foreach($arts as $item)
                            
                                <div class="col-3 ">
                                    <div class="rounded-full py-6 px-2">
                                        <div class="card">
                                            {{--<img  title= {{$item->Nombre}}
                                                    alt= "Titulo"
                                                class="card-img-top" 
                                                src= {{$item->Imagen}}
                                                height= "217px" > --}}
                                                    
                                            <div class="card-body">
                                                <span> {{$item->nombre}} <br></span>   
                                                <span> $ {{$item->precio}} <br></span>   
                                                <span> Stock: {{$item->cantidad}} <br></span>   
                                            </div>

                                            <a  href=" {{ url('agregar/'.$item->id) }}" 
                                                class="btn btn-outline-primary">
                                                        Agregar                                         
                                            </a>
                                            <a   href=" {{ route('detalle_articulo', $item) }}" 
                                                class="btn btn-light" >
                                                        Detalle </a>
                                            {{-- <a   href=" {{ url('eliminar/'.$item->id) }}" 
                                                    class="btn btn btn-danger" >
                                                        Eliminar </a> --}} 
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                       </div> 
 
                    </div>
                </div>
            </div>
        </div>
    </div>      
    -->    

</x-app-layout>