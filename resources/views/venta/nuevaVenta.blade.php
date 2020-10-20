<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva Venta') }}
        </h2>
    </x-slot>
    
    <!-- espacio para mensajes -->
    <div class="alert alert-success">
        @if (session('mensaje'))
        {{ session( 'mensaje' ) }}        
        @endif
    <br>
    <!-- link hasta carrito  -->
    <a   href=" {{ route ('verCarrito') }}"
            class="badge badge-success"> 
                Ver carrito 
        </a>
    </div>

    <div class="container mt-10">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" align= "center">
                        <h2>
                            Articulos Para venta
                        </h2>
                    </div>           

                    <div class="row">

                    @foreach($arts as $item)
                    <!-- en esta tarjeta recorro mis productos disponibles en la base -->
                    <!-- puede comprar, ver detalle y eliminar  -->
                        <div class="col-3">
                            <div class="card">
                                {{--<img  title= {{$item->Nombre}}
                                        alt= "Titulo"
                                    class="card-img-top" 
                                    src= {{$item->Imagen}}
                                    height= "217px" > --}}
                                        
                                <div class="card-body">
                                    <span> {{$item->nombre}} <br></span>   
                                    <span> $ {{$item->precio}} <br></span>   
                                    
                                </div>

                                <a   href=" {{ url('agregar/'.$item->id) }}" 
                                     class="btn btn btn-primary" >
                                            Agregar
                                </a>
                                <a   href=" {{ route('detalle_articulo', $item) }}" 
                                    
                                        class="btn btn btn-secondary" >
                                            Detalle </a>
                                {{-- <a   href=" {{ url('eliminar/'.$item->id) }}" 
                                        class="btn btn btn-danger" >
                                            Eliminar </a> --}}
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>