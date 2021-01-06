@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent

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

<div class="container ">
    <br>
        <a href="{{ route('verCarrito') }}" 
                class="btn btn-primary float-right">
                     Ir a Carrito
         </a>
</div>
<!-- si vuelve vacio -->
@if($cont==0){
<br><br>
    <div class="text-center text-4xl font-extrabold leading-none tracking-tight">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
            Sin productos en Stock
        </span>
     </div>

}@else{
      <!-- si hay resultado armo tabla --> 
  <div class="container mt-10">
    <div class="row justify-content-center mx-auto ">
      <div class="col-md-0 mx-auto">
          <br><br>
          <table class="table " >
            <thead class="table-info font-weight-bolder font-extrabold">
              <tr>
                <th scope="col">
                    Nombre
                </th>
                <th scope="col">
                    Cantidad
                  </th>
                <th scope="col">
                    Precio de Compra
                </th>
                <th scope="col">
                    Iva Ventas
                </th>
                <th scope="col">
                    Precio de Venta
                </th>
                <th scope="col">
                    Marca
                </th>
                <th scope="col">
                    Modelo
                </th>
                <th scope="col">
                    Categoria
                </th>
                <th scope="col">
                    Proveedor                  
                </th>
                <th scope="col">
                    Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($arts as $item)
                <tr> 
                  <td>  
                    <a href=" {{ route('detalle_articulo', $item) }}">
                      {{ $item->nombre }}
                    </a>
                  </td>
                  <td>
                    {{ $item->cantidad }}
                  </td>
                  <td>
                  $  {{ $item->precioCompra }} 
                  </td>
                  <td >
                  $  {{ $item->iva }}
                  </td>
                  <td>
                  $  {{ $item->precioVenta }}
                  </td>
                  <td>
                    {{ $item->marca }}
                  </td>
                  <td>
                    {{ $item->modelo }}
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
      </div>        
    </div>
        {{ $arts->links() }}
  </div>
<div class="container">
  <a href=" {{ route ('articulosPdf') }}" class="btn btn-primary" >
        Imprimir pdf
    </a>
    <a href=" {{ route ('articulosPdfHoriz') }}" class="btn btn-success" >
        Imprimir pdf Horizontal
    </a>
</div>

}@endif   

  
@endsection




    


