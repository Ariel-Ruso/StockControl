<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito Compras') }}
        </h2>
    </x-slot>
    
    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tu Carrito</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif             
                
                    <?php $valor=0 ?>
                    
                    @if(session('carrito'))
                        <table class="table table-bordered">
                            <thead >
                                <tr>
                                    <th>
                                        Articulo
                                    </th>
                                    <th>
                                        Precio Unitario
                                    </th>
                                    <th>
                                        Cantidad
                                    </th>
                                   
                                    {{-- <th>
                                        Imagen
                                    </th> --}}
                                    <th>
                                        Accion
                                    </th>
                                    <th>
                                        Precio Total
                                    </th>
                                </tr>
                            </thead>

                        @foreach (session('carrito') as $id => $detalle)
                        <!-- recorro carrito  -->
                            <?php $valor += $detalle['Precio'] * $detalle['Cantidad'] ?>

                            <tr>
                                <th  class="font-weight-normal" >
                                    {{ $detalle['Nombre'] }}
                                </th>
                                <th  class="font-weight-normal" >
                                    $ {{ $detalle['Precio'] }}
                                </th>
                                <th  class="font-weight-normal" > 
                                    {{ $detalle['Cantidad'] }}
                                </th>
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
                                <th  class="font-weight-normal" >
                                    $ {{ $detalle['Precio'] * $detalle['Cantidad'] }}
                                </th>
                                {{-- <th>
                                    <img src= {{ $detalle['Imagen'] }} width="70" height="70"/>
                                </th> --}}
                               
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan= "12" align="right" >
                                <h3>
                                    Total $ {{ $valor }}
                                </h3>
                            </td>
                        </tr>
                    
                        </table>
                    @else
                        <div class="alert alert success">
                            "No hay productos"
                        </div>
                    @endif
                    
                    <div>
                        <a href=" {{ route('nueva_venta') }}" class="btn btn-warning" >
                            Seguir Comprando
                        </a>
                        <a href=" {{ route('nueva_venta') }}" class="btn btn-success align= right" >
                            Terminar Compra
                        </a>
                    </div>
                    <div>
                        <br>
                        <a href="{{ url('verSession') }}" class= "btn btn-secondary">
                            Ver Session             
                        </a>
                    </div>
                    <br>
                    <tr colspane> 
                            <form method="post" action="{{ url('nuevaVenta') }}">
                                @csrf
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
                            </form>
                    </tr>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
