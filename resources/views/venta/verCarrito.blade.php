@extends('layouts.app')
@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
  </div>
<x-grafica img="/Storage/carrito.png" />
<br>


<table class= "table mb-1 "> 
    <th>
      </th>
        
 </table>        
 @component('components.caja-btn')
 @endcomponent

   

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-auto ">
                <div class="card bg-white rounded shadow-2xl">
                    <div class=" py-3 px-8 bg-orange-300 d-flex justify-content-between 
                                align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                            <h3>
                            Tus Artículos
                            </h3>
                        </span>
                    </div>
                    <div class="card-body ">

                    @if(session('carrito'))
                    {{-- @isset(session('carrito')) --}}
                        <table class="table table-bordered border-blue-500 border-opacity-100">
                            <thead class= "text-center bg-orange-100">
                                <tr>
                                    <th scope="col">
                                        Nombre
                                    </th>
                                    <th scope="col">
                                        Precio 
                                    </th>
                                   {{--  <th scope="col">
                                        Cant.
                                    </th> --}}
                                    {{-- <th>
                                        Imagen
                                    </th> --}}
                                    
                                    <th scope="col">
                                        SubTotal
                                    </th>
                                    {{-- <th scope="col">
                                        Desc.
                                    </th> --}}
                                    <th scope="col">
                                        Unidad
                                    </th>
                                </tr>
                            </thead>
                        @foreach (session('carrito') as $id => $detalle)

                        {{-- <form action="{{ route('setDescuento') }}" 
                                    method="POST" 
                                    enctype="multipart/form-data" 
                                    >
                                    @csrf --}}
                            <form action="{{ route('ventaPeso') }}" 
                                    method="POST" 
                                    enctype="multipart/form-data" 
                                    >
                                    @csrf 
                                    
                                         <input  type="hidden" 
                                                value= {{ $detalle['Art_id'] }}
                                                name= "id"
                                            /> 
                                    
                            <!-- recorro carrito  -->  
                            <tr>
                                <th  class="font-weight-normal text-center col-md-5" >
                                    {{ $detalle['Nombre'] }}
                                </th>
                                <th  class="font-weight-normal text-center col-md-4" >
                                    $ {{ number_format($detalle['Precio'],2) }}
                                </th>
                             {{--    <th  class="font-weight-normal text-center" > 
                                    {{ $detalle['Cantidad'] }}
                                    / {{ $detalle['Disponible'] }}
                                </th> --}}
                                <th  class="font-weight-normal text-center col-md-3" >
                                    $ {{ number_format($detalle['SubTotal'],2) }}
                                </th> 
                               {{--  <th  class="font-weight-normal text-center col-md-3" >
                                    $ {{ number_format($detalle['Descuento'],2) }}
                                </th>   --}}
                                
                                {{--<th>
                                    <img src= {{ $detalle['Imagen'] }} width="70" height="70"/>
                                </th> --}}
                                {{-- 
                                 <th class="font-weight-normal text-center col-md-2">
                                    <a  href="{{ url ('agregar/' .$id)  }}"
                                        class= "btn btn-primary">
                                            +
                                    </a>
                                    <a  href="{{ url ('eliminarCarr/' .$id )  }}"
                                        class= "btn btn-danger">
                                            -
                                    </a>
                                   

                                </th>
                                 --}}
                            </tr>
                            <tr>
                                <th class="text-center">
                                    Peso (Kg)
                                </th>
                               
                                <th class="text-center">
                                    
                                    <input  type="float" 
                                            class="border border-primary col-md-8" 
                                            name="inpeso" 
                                            id="inpeso" 
                                            {{-- onchange="peso();" --}}
                                            onclick="peso();"
                                            />
                                </th>
                                <th>
                                     <button class="btn btn-success btn-sm shadow " 
                                             type="submit"
                                             
                                             >
                                              <i class="fa fa-check">        
                                                
                                              </i>
                                     </button>
                                    {{--  <a  href="{{ route ('setDescuento/'  )  }}"
                                        type="submit"
                                        class= "btn btn-info">
                                            Peso
                                    </a> --}}
                                </th>
                                <th>
                                    <label name="pxkg" id="pxkg" value= "$" >

                                    </label>
                                    
                                </th>
                              
                            </tr>
                           
                        </form>
                        @endforeach
                        <tr>
                            <td colspan= "12" class= "text-right"> 
                                <h3>
                                    Efectivo $ {{ number_format ($total, 2) }}
                                </h3>
                                
                                {{-- <h3>
                                    Tarjeta $ {{ number_format ($totalTar, 2) }}
                                </h3> --}}
                                
                            </td>
                        </tr>
                        </table>
                        
                    @else

                        <div class="text-center text-3xl font-extrabold leading-none tracking-tight">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-blue-500">
                                Sin productos
                            </span>
                        </div>
                    
                    @endif        
                    {{-- @endisset --}}
                    <div name="opciones compra " 
                         class=" mt-5 text-left row justify-content-center ">
                        <a  href=" {{ route('articulos.index') }}" 
                            class="btn btn-warning shadow" >
                                Agregar Elementos
                        </a>
                    </div> 

                   {{--
                    <br><br>
                        <hr noshade="noshade" />
                    <div name="descuento"
                        class=" mt-5 row justify-content-center ">
                        <div class="text-center text-2xl font-bold leading-none tracking-tight">
                            <span class="bg-clip-text text-transparent 
                                        bg-gradient-to-r from-green-500 to-teal-500">
                                Descuento :
                            </span>
                        </div>
                        <input  type="number" 
                        class="border border-primary col-md-2 mx-3" 
                        name="descuento" 
                        id="descuento" 
                        value="0"
                        onchange='Descuento();'
                >    
                        <div class="text-center text-2xl font-bold leading-none tracking-tight">
                            <span class="bg-clip-text text-transparent 
                                        bg-gradient-to-r from-green-500 to-teal-500">
                                Precio Final :
                            </span>
                        </div>
                        <input  type="text" 
                                class="border border-primary col-md-2 mx-3" 
                                name="tot2" 
                                id="tot2" 
                                onchange= "Descuento2();"
                        />

                    </div>      --}}   
                   

                    
                    <hr noshade="noshade" />

                    <div name="opciones cliente " 
                         class=" mt-5 row justify-content-center ">
                         <div class="text-center text-2xl font-bold leading-none tracking-tight">
                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-400 to-teal-500">
                                 Cliente :
                            </span>
                                                  
                            @if($clie == "Sin seleccionar")
                                {{ $clie }}
                            @else
                                <br><br>                      
                         
                                    {{ $clie->dni }}<br>                            
                                    {{ $clie->nombre }} <br>  
                                    {{ $clie->direccion }}  <br> 
                                
                            @endif
                        </div>   
                    </div>
                        
                    </div> 
                    <div class="row justify-content-center px-5">
                        @if($clie == "Sin seleccionar")
                            <a  href=" {{ route('clientes.index') }}" 
                                class="btn btn-outline-primary mt-5 shadow" >
                                    Buscar Cliente
                            </a>
                            <a  href=" {{ route('clientes.unselect') }}" 
                                class="btn btn-outline-danger mt-5 disabled" >
                                    Cambiar Cliente
                            </a>
                        @else
                        <a  href=" {{ route('clientes.index') }}" 
                                class="btn btn-outline-primary mt-5 disabled" >
                                    Buscar Cliente
                            </a>
                             <a  href=" {{ route('clientes.unselect') }}" 
                                class="btn btn-outline-danger mt-5 shadow " >
                                    Cambiar Cliente
                            </a> 
                        @endif
                        </div>
                        
                        <hr noshade="noshade" />
                        
                        <div class="row justify-content-center px-5 py-3">
                            @if ( session('carrito') && $clie != "Sin seleccionar")
                                <a  href=" {{ route('detallePedido') }}" 
                                    class="btn btn-success mx-2 mt-1 shadow" >
                                        Terminar Venta
                                </a>
                               {{--  <a  href=" {{ route('detallePe') }}" 
                                    class="btn btn-outline-primary  mx-2 mt-5 " >
                                        Pedido
                                </a> --}}
                            @else
                                <a  href=" {{ route('detallePedido') }}" 
                                    class="btn btn-success mt-1 disabled" >
                                        Terminar Venta
                                </a>
                                {{-- <a  href=" {{ route('detallePe') }}" 
                                    class="btn btn-outline-primary mx-2 mt-5 disabled " >
                                        Pedido
                                </a> --}}
                            @endif 

                            @if (session('carrito'))
                                 <a  href=" {{ route('detallePresupuesto') }}" 
                                    class="btn btn-info mx-2 mt-1 shadow" >
                                        Presupuesto
                                </a> 
                            @else
                                 <a  href=" {{ route('detallePresupuesto') }}" 
                                    class="btn btn-info mx-2 mt-1 disabled" >
                                        Presupuesto
                                </a> 
                            @endif   
                            
                        </div>
                        
                     {{-- 
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
                          
                    </div>
                    --}}
                
                    
                 
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <script >
        function peso() {
        
            const precio = '<?php echo $detalle['Precio'] ?>';
            const peso = document.getElementById('inpeso');
            const res = document.getElementById('pxkg');

            //eventos
            peso.onclick = function() {
                //alert(parseFloat(peso.value));
                //res.textContent= number (parseFloat(peso) * parseFloat(precio));
                res.textContent = parseFloat( peso.value * precio).toFixed(2);
                //alert ( Session()->get());
                //Session::put( 'Art_id', 'peso' );
                //$value = $request->session()->get('key');

            }

        }
    </script>

        
    
@endsection
