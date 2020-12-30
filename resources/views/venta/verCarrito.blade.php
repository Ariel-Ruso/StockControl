@extends('layouts.app')

@section('content')
  
@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent
    
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-orange-300 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            Tu Carrito
                        </span>
                    </div>
                    <div class="card-body">
                                  
                    @if(session('carrito'))
                        <table class="table table-bordered border-blue-500 border-opacity-100">
                            <thead >
                                <tr>
                                    <th>
                                        Articulo
                                    </th>
                                    <th>
                                        Precio Unitario
                                    </th>
                                    <th>
                                        Cant / Disp
                                    </th>
                                    {{-- <th>
                                        Imagen
                                    </th> --}}
                                    <th>
                                        SubTotal
                                    </th>
                                    <th>
                                        Accion
                                    </th>
                                </tr>
                            </thead>

                        @foreach (session('carrito') as $id => $detalle)
                        
                        <!-- recorro carrito  -->
                            <tr>
                                <th  class="font-weight-normal " >
                                    {{ $detalle['Nombre'] }}
                                </th>
                                <th  class="font-weight-normal" >
                                    $ {{ number_format($detalle['Precio'],2) }}
                                </th>
                                <th  class="font-weight-normal" > 
                                    {{ $detalle['Cantidad'] }}
                                    / {{ $detalle['Disponible'] }}
                                </th>
                                <th  class="font-weight-normal" >
                                    $ {{ number_format($detalle['SubTotal'],2) }}
                                </th>
                                {{-- <th>
                                    <img src= {{ $detalle['Imagen'] }} width="70" height="70"/>
                                </th> --}}
                                <th>
                                    <a  href="{{ url ('agregar/' .$id )  }}"
                                        class= "btn btn-primary">
                                            +
                                    </a>
                                    <a  href="{{ url ('eliminarCarr/' .$id )  }}"
                                        class= "btn btn-danger">
                                            -
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan= "12" align="right" >
                                <h3>
                                    Total $ {{ number_format ($subtotal, 2) }}
                                </h3>
                            </td>
                        </tr>
                        </table>
                        <a  href=" {{ route('detallePedido') }}" 
                            class="btn btn-outline-success align= right" >
                                Terminar Compra
                        </a>

                    @else
                    <div class="text-center text-5xl font-extrabold leading-none tracking-tight">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
                            Sin productos
                        </span>
                    </div>
                    
                    @endif        
                    <div name="opciones compra " class="mt-15">
                        <a  href=" {{ route('mostrarTodosArt') }}" 
                            class="btn btn-outline-warning" >
                                Seguir Comprando
                        </a>
                       
                    </div> 
                     <!-- 
                    <div name="testing">
                        <br>
                        <a  href="{{ url('verSession') }}" 
                            class= "btn btn-secondary">
                                Ver Session             
                        </a>
                        <a  href="{{ url('borrarCarr') }}" 
                            class= "btn btn-danger">
                                Vaciar Carrito
                        </a>
                          -->
                    </div> 
                    <br>
                    <tr colspane> 
                            <form method="post" action="{{ url('nuevaVenta') }}">
                                @csrf
<!-- 
                                <div class= "alert alert-success">
                                    <div class= "form-group">
                                        <label >
                                            Correo contacto: 
                                        </label>
                                        <input type="text" name="email" 
                                            id="email"
                                            class= "form-control"
                                            type= "email"
                                            required
                                        >
                                    </div>
                                    <button class= "btn btn-primary" type= "submit">
                                        Pagar
                                    </button>
                                </div>
                                 -->
                            </form>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
