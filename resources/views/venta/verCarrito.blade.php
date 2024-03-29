@extends('layouts.app')
@section('content')

    <x-header titulo="Carrito" />  
    @component('components.caja-btn')
    @endcomponent

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-auto ">
                <div class="card shadow-2xl">
                     <div class=" py-3 px-8 align-items-center cart2">
                        <span class="text-center mx-auto font text-2xl ">
                            <h3>
                                Tus Artículos
                            </h3>
                        </span>
                    </div> 
                    <div class="card-body ">

                     @if(session('carrito')) 
                    

                        <table class="table table-bordered border-blue-500 border-opacity-100">
                            <thead class= "text-center cart">
                                
                                    <tr>
                                        <th scope="col">
                                            Artículo
                                        </th>
                                        <th scope="col">
                                            P Unitario
                                        </th>
                                        <th scope="col">
                                            Cantidad
                                        </th>
                                        @if (Auth::user()->name == 'Akihay') 
                                            <th scope="col">
                                                Peso (Kg)
                                            </th>        
                                        @endif 
                                        <th scope="col">
                                            Descuento
                                        </th> 
                                       {{--  <th scope="col">
                                            SubTotal
                                        </th> --}}
                                       
                                    </tr>

                                {{-- @else
                                    <tr>
                                        <th scope="col">
                                            Artículo
                                        </th>
                                        <th scope="col">
                                            P Unitario
                                        </th>
                                        <th scope="col">
                                            Cantidad
                                        </th>
                                        <th scope="col">
                                            SubTotal
                                        </th>
                                        <th scope="col">
                                            Descuento
                                        </th> 
                                        <th scope="col">
                                            Acción
                                        </th>
                                    </tr>
                                 --}}
                                   
                            </thead>

                            {{-- @if (Auth::user()->name == 'Akihay')  --}}
                          {{-- @if(session('carrito')) --}}

                            @foreach (session('carrito') as $id => $detalle)

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
                                            <th  class="font-weight-normal text-center col-md-3" >
                                                {{ $detalle['Nombre'] }}
                                            </th>
                                            <th  class="font-weight-normal text-center col-md-2" >
                                                $ {{ number_format($detalle['Precio'],2) }}
                                            </th>
                                        
                                            <th  class="font-weight-normal text-center" > 

                                                <div class="row-md-2">
                                                    {{ $detalle['Cantidad'] }}
                                                    {{-- / {{ $detalle['Disponible'] }} --}}
                                        
                                                </div>
                                                <div class="row-md-1">
                                                                                
                                                    <a  href="{{ url ('agregar/' .$id)  }}"
                                                    class= "btn-sm btn-primary shadow m-1">
                                                        
                                                        <i class="fa fa-plus fa-sm">        
                                                        
                                                        </i>
                                                    </a>
                                                    <a  href="{{ url ('eliminarCarr/' .$id )  }}"
                                                        class= "btn-sm btn-danger shadow m-1 ">
                                                            
                                                        <i class="fa fa-minus fa-sm">        
                                                            
                                                        </i>
                                                    </a>
                                                
                                                </div>                                   
                                            
                                            </th>
                                            @if (Auth::user()->name == 'Akihay')  
                                                <th  class="font-weight-normal text-center col-md-4" >
                                                     {{ number_format($detalle['Cantidad'],2) }}  
                                                     <br>                   
                                                    <input  type="float" 
                                                            class="border border-primary col-md-4" 
                                                            name="inpeso" 
                                                            id="inpeso" 
                                                            {{-- onchange="peso();" --}}
                                                            onclick="peso();"
                                                            />

                                                    <button class="btn btn-success btn-sm shadow mt-1" 
                                                            type="submit"        
                                                            >
                                                            <i class="fa fa-check">   </i>     
                                                            
                                                            
                                                    </button>
                                                </th>
                                            @endif
                                            <th  class="font-weight-normal text-center col-md-4" >
                                                $ {{ number_format($detalle['Descuento'],2) }}
                                                
                                                    <br>
                                                    <input  type="number" 
                                                            class="border border-primary col-md-6" 
                                                            name="descuento" 
                                                            id="descuento" 
                                                            onchange="Descuento();"
                                                            onclick="Descuento();"
                                                            />
                                            </th>  
                                            {{-- <th  class="font-weight-normal text-center col-md-4" >
                                                $ {{ number_format($detalle['SubTotal'],2) }}
                                            </th> --}}
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
                        <br>
                        <div class="text-center ">
                                <h3>
                                    Sin productos
                                </h3>
                        </div>
                    
                     @endif   

                    <div name="opciones compra " 
                         class=" mt-5 text-left row justify-content-center ">
                        <a  href=" {{ route('articulos.index') }}" 
                            class="btn btn-warning shadow" >
                                Agregar Elementos
                        </a>
                        <a  href="{{ url('borrarCarr') }}"  
                            class= "btn btn-danger ml-4">
                                Vaciar
                        </a>
                    </div> 

                                       
                    <hr noshade="noshade" />

                    <div name="opciones cliente " 
                         class=" mt-5 row justify-content-center ">
                         <div class="text-center ">                         
                                <h3>
                                    Cliente :
                                </h3>
                            @if($clie == "Sin seleccionar")
                            <h4>
                                {{ $clie }}
                            </h4>
                                
                            @else
                                <br>                  
                         
                                    {{ $clie->dni }}<br>                            
                                    {{ $clie->nombre }} <br>  
                                    {{ $clie->direccion }}  <br> 
                                   $ {{ $clie->ctaCte }}  <br> 
                                
                            @endif
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

                            
                            {{-- @if (session('carrito'))
                                
                                <a  href=" {{ route('detallePresupuesto') }}" 
                                    class="btn btn-info mx-2 mt-1 shadow" 
                                    @if (Auth::user()->name == 'Geminis') 
                                        style="display: none"
                                    @endif
                                    >
                                        Presupuesto
                                </a>
                            @else
                                <a  href=" {{ route('detallePresupuesto') }}" 
                                    class="btn btn-info mx-2 mt-1 disabled" >
                                    Presupuesto
                                </a>
                            @endif    --}}

                        </div>                
                
                </div>
            </div>
        </div>
        
    </div>
    <script>
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

        function Descuento($total) {

            const tot= '<?php echo $total; ?>'
            const desc = document.getElementById('descuento');
            const porc= Number (desc * tot) /100; 

            const final = tot - desc;
            
            
            //eventos
                descuento.onclick = function() {
                    //alert(final);
                    document.detail.tot2.value = final;
                    //document.detail.descP.value = porc.value;
        //                    alert(sessionStorage.length()) );
                    //alert(localStorage.getItem("Precio") );
                    //sessionStorage.setItem('Descuento', 'final');
                    //sessionStorage.setItem('test', 1);
                    //alert( sessionStorage.getItem(Carrito) );
                    
                    //alert( pre) ;
                    }

            }
        function checkInput(precioCompra) {

            var Precio = document.calc.precioCompra.value;
            var pre = document.calc.precioVenta.value;
            var gano = pre- Precio;
            var gano1 = Number (gano / Precio);
            var ganof = Number (gano1 * 100);

            document.calc.ganancia.value = ganof;

            var finaltarjeta = Number (pre * 0.17 ) + Number (pre);

            document.calc.pVentaTarj.value = Math.round(finaltarjeta);
            document.calc.pVentaTarj.value = redondeo2 (document.calc.pVentaTarj.value);

        }

      /*   function Descuento2($total) {

            var tot = '<?php echo $total; ?>'
            document.detail.descuento.value = tot;
        } */
       
       
        </script>
    
@endsection
