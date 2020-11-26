<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Articulos Disponibles') }}
      </h2>
  </x-slot>

@if (session('mensaje'))
  <div class="alert alert-success">
    {{ session('mensaje') }}
  </div>
@endif

<div class="container mt-10" name="busqueda" >
  <nav class="navbar navbar-light float-right">
    <form   class="form-inline"
              action="{{ route('mostrarxCate') }}"
              >
              <select class="form-control" 
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

<!-- si hay resultado armo tabla --> 
  <div class="container">
      <br><br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($arts as $item)
            <tr>
              <th scope="row">
                {{ $item->id }}
              </th>   
              <td>  
                <a href=" {{ route('detalle_articulo', $item) }}">
                  {{ $item->nombre }}
                </a>
              </td>
              <td>
                {{ $item->cantidad }}
              </td>
              <td>
              $  {{ $item->precio }}
              </td>
              <td>
                {{ $cates[ ($item->categorias_id)-1 ]->nombre }}
              </td>
              <td>
                {{ $proves[ ($item->proveedors_id)-1 ]->nombre }}
              </td>
              <td>
                <a  href="{{ route ('editar_articulo', $item) }}" 
                    class="btn btn-warning btn s-m">
                      Editar 
                </a>
                <form   action=" {{ route('eliminar_articulo', $item) }}" 
                        method="Post" 
                        class="d-inline" >
                          @method ('DELETE')
                          @csrf
                    <button class="btn btn-danger btn s-m" 
                            type="submit" > 
                              Eliminar         
                    </button>
                </form>
                <a   href=" {{ url('agregar/'.$item->id) }}" 
                     class="btn btn-outline-primary">
                        Comprar 
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $arts->links() }}
  </div>
  

  <!-- si vuelve vacio -->
  @if(!$arts)
    <div class="text-center text-5xl font-extrabold leading-none tracking-tight">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
            Sin productos
        </span>
     </div>
@endif   


</x-app-layout>




    


