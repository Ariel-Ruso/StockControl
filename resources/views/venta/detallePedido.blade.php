<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Compra') }}
        </h2>
    </x-slot>
    <br>
    <!-- espacio para mensajes -->
    <div class="col-md-4 mx-auto">
        <div class="alert alert-success mt-3">
            @if (session('mensaje'))
                {{ session( 'mensaje' ) }}        
            @endif
        </div>
       
    </div>
    <div class="container col-md-10 aling=right ">
            <a href="{{route('verCarrito')}}" 
                class="btn btn-primary float-right btn btn-sm">
                    Volver al carrito...
            </a>
    </div>
    <br>
    
    <div class="container mt-4" name= "datos">
        <h3 align="center" >
            Usuario
        </h3>
        <form   action= "{{ route('finalizarVenta') }}" 
                method="POST"
                >
                @csrf
            <div name="datosUser mt-5">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="flex flex-col mt-1">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead>
                                                <tr>
                                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                                    Nombre: {{Auth::user()->name }}
                                                    <br>
                                                    Correo: {{Auth::user()->email }}                        
                                                    </th><br>
                                                    <th>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h3 align="center">
                Articulos
            </h3><br>
            <div name="datosArt mt-5">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div name="datosArts mt-5">
                                <div class="flex flex-col mt-1">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead>
                                                    <tr>
                                                        <th class="px-2 py-3 ">
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
                                                                SubTotal
                                                            </th>
                                                            <th>
                                                                IVA
                                                            </th>
                                                        </th> 
                                                        </tr>   
                                                    </thead>
                                                    
                                                        @foreach ($carrito as $detalle)    
                                                        <tbody>
                                                        <th class="px-2 py-3 ">
                                                            <th  class="font-weight-normal" >
                                                                {{ $detalle['Nombre'] }}
                                                            </th>
                                                            <th  class="font-weight-normal" >
                                                                $ {{ number_format($detalle['Precio'],2) }}
                                                            </th>
                                                            <th  class="font-weight-normal" > 
                                                                {{ $detalle['Cantidad'] }}    
                                                            </th>
                                                            <th  class="font-weight-normal" > 
                                                                $ {{ number_format($detalle['SubTotal'],2) }}    
                                                            </th>  
                                                            <th  class="font-weight-normal" > 
                                                                $ {{ number_format( ($detalle['SubTotal'])*0.21 ,2) }}    
                                                            </th>
                                                        </th>
                                                        </tbody>                        
                                                        @endforeach
                                                        <tr>
                                                            <td colspan= "12" align="right">
                                                            <br>
                                                                <h3>
                                                                    Total $ {{ number_format ($total, 2) }}
                                                                </h3>
                                                            </td>
                                                        </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h3 align="center">
                Forma De Pago
            </h3><br>
            <div name="datosPago mt-5">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div name="formasPago mt-5">
                                <div class="flex flex-col mt-1">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <div class="px-2 py-3 ">
                                                    <div class="form-check" name="check pagos">                                               
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios1" 
                                                                value="1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Efectivo  <br>
                                                            1 pago de $ {{ number_format( $total, 2) }}
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios2" 
                                                                value="2">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Debito  - 10% recargo 
                                                        </label><br>
                                                        <!-- <div class="col-md-2">
                                                            <input  type="integer"
                                                                    name="debito"
                                                                    placeholder="recargo"
                                                                    class="form-control mb-2"
                                                            />  %
                                                        </div> -->
                                                        
                                                        <label>
                                                            1 pago de $ {{  number_format($total + ($total*0.1) ,2) }}
                                                                           
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios3" 
                                                                value="3">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            Tarjeta Credito - (20 % recargo) - 
                                                            Total: $ {{  number_format($total + ($total*0.2) ,2) }}<br>
                                                            12 cuotas  $ {{  number_format( ($total + ($total*0.1) )/12 ,2) }}<br>
                                                            <br><br>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-2">
                <button class="btn btn-success mt-3 align-right" 
                        type="submit">
                            Finalizar Venta
                </button>
            </div>
        </form>
</div>
<div class="footer">
.
</div>
</x-app-layout>