@extends('layouts.app')

@section('content')

@component('components.botones')
@endcomponent

<div class="container mt-4 col-md-10 " name="datos">
    {{-- <h3 style="text-align:center " class="mx-5 ">
        Usuario
    </h3> --}}
    @if($errors->any())
    Hay errores
    @endif
    <form   action="{{ route('finalizarVenta') }}" 
            method="POST" 
            name="detail">
            
        @csrf
{{-- 
        <div name="datosUser mt-5">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="flex flex-col mt-1">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden bg-blue-200 border-b border-gray-400 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                                <tr>
                                                    <th class="px-6 py-3 bg-gray-150 text-center text-m leading-4 font-medium text-gray-800 uppercase tracking-wider">
                                                        {{Auth::user()->name }}
                                                        <br><br>

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
 --}}
        <h3 style="text-align:center">
            Cliente
        </h3><br>
        <div name="datosCliente mt-5">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div name="DatosCli mt-5">
                            <div class="flex flex-col mt-1">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden bg-blue-200 border-b border-gray-400 sm:rounded-lg">
                                            <div class="px-2 py-3 text-center">
                                                <label class="form-check-label " for="dni">
                                                    <strong>
                                                        DNI:
                                                    </strong>
                                                </label>
                                                <!--  <input type="text"  name="dnicliente" 
                                                    class="border border-primary col-auto" value= >
                                                    </input> -->
                                                {{ $clie->dni }}
                                                <br>

                                                <label class="form-check-label" for="apellidoyNombre">
                                                    <strong>
                                                        Apellido y Nombre:
                                                    </strong>
                                                </label>
                                                <!-- <input type="text"  name="apellidoyNombre" 
                                                            class="border border-primary col-auto"
                                                    value= {{ $clie->nombre }}>
                                                    </input> -->
                                                {{ $clie->nombre }}

                                                <br>

                                                <label class="form-check-label" for="domicilioCliente">
                                                    <strong>
                                                        Domicilio:
                                                    </strong>
                                                </label>
                                                <!-- <input type="text"  name="domicilioCliente" 
                                                        class="border border-primary col-auto"
                                                    value= {{ $clie->direccion }} > 
                                                    </input>-->

                                                {{ $clie->direccion }}

                                                <br>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <h3 style="text-align:center ">
            Artículos
        </h3><br>
        <div name="datosArt mt-5">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div name="datosArts mt-5">
                            <div class="flex flex-col mt-1">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden bg-blue-200 border-b border-gray-400 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="px-2 py-3 text-center">
                                                    <tr>
                                                        
                                                        <th>
                                                            Artículo
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

                                                        </th>
                                                    </tr>
                                                </thead>

                                                @foreach ($carrito as $detalle)
                                                <tbody >
                                                    <thead class=" text-center">
                                                        {{-- <th class="px-2 py-3 "> --}}
                                                        <th class="font-weight-normal">
                                                            {{ $detalle['Nombre'] }}
                                                        </th>
                                                        <th class="font-weight-normal ">
                                                            $ {{ number_format($detalle['Precio'],2) }}
                                                        </th>
                                                        <th class="font-weight-normal">
                                                            {{ $detalle['Cantidad'] }}
                                                        </th>
                                                        <th class="font-weight-normal">
                                                            $ {{ number_format($detalle['SubTotal'],2) }}
                                                        </th>

                                                    </th>
                                                    
                                                </tbody>
                                                @endforeach
                                                <br>
                                                
                                                <tr>
                                                    <td colspan="10" align="right" >
                                                        <br>
                                                        <hr noshade="noshade" class="mx-5"  />
                                                        <h5 class="mr-5">
                                                            Total: $ {{ number_format($detalle['SubTotal'],2) }}
                                                        </h5>
                                                        
                                                        <h5 class="mr-5 mt-1">
                                                            Descuento: $ - {{ number_format($detalle['Descuento'],2) }}
                                                        </h5>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    
                                                    <td colspan="12" align="right" >
                                                        
                                                        <hr noshade="noshade" class="mx-5"  />
                                                          
                                                        <h4 class="mr-5">
                                                            Efectivo : $ {{ number_format ($total, 2) }}
                                                        </h4>
                                                        <h4 class="mr-5">
                                                            Tarjeta :  $ {{ number_format ($totalTar, 2) }}
                                                        </h4>
                                                                           
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
        <br><br>
        <h3 style="text-align:center">
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
                                        <div class="shadow overflow-hidden bg-blue-200 border-b border-gray-400 sm:rounded-lg">
                                            <div class="px-4 py-3 ">
                                                <div class="form-check" name="check pagos">
                                                    <input class="form-check-input" type="radio" name="tipoPago" id="exampleRadios1" value="1" 
                                                            checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Efectivo <br>
                                                        1 pago de $ {{ number_format( $total, 2) }}<br>
                                                    </label>
                                                </div>
                                                <div class="w-500"></div>
                                                <hr noshade="noshade" />
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipoPago" id="exampleRadios2" value="2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Débito - <br>
                                                        1 pago de $ {{ number_format($total ,2) }}
                                                    </label>
                                                    <!-- <div class="col-md-2">
                                                            <input  type="integer"
                                                                    name="debito"
                                                                    placeholder="recargo"
                                                                    class="form-control mb-2"
                                                            />  %
                                                        </div> -->
                                                </div>
                                                <hr noshade="noshade" />
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="tipoPago" id="exampleRadios3" value="3">
                                                    <label class="form-check-label" for="exampleRadios3">
                                                        Tarjeta Crédito -
                                                        <br> 1 pago
                                                        Total: $ {{ number_format($total ,2) }}<br>
                                                    </label>
                                                </div>
                                                <hr noshade="noshade" />
                                                <div class="form-check">
                                                    <input  class="form-check-input" type="radio" name="tipoPago" 
                                                            id="exampleRadios4" value="4">
                                                    <label class="form-check-label" for="exampleRadios4">
                                                        Tarjeta Crédito 
                                                    </label>
                                                    <!-- <input  type="number"  name="noBancaria4" class="border border-primary" >
                                                        </input> -->
                                                    <br>
                                                    Total $ {{ number_format($totalTar, 2) }} -
                                                    {{-- Total $ {{ number_format( $detalle['PrecioT'])  }} - --}}
                                                    
                                                    12 cuotas $ {{ number_format( ($totalTar) /12 ), 2  }}
                                                    <br>
                                                    
                                                    </label>
                                                </div>
                                                <hr noshade="noshade" />
                                                <div class="flex flex-column"> 
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tipoPago" id="exampleRadios5" value="5">
                                                        <label class="form-check-label" for="exampleRadios5">
                                                            Tarjeta Crédito <br>
                                                            No Bancaria - $
                                                            
                                                                <input  type="number" 
                                                                        name="noBancaria5" 
                                                                        class="border border-primary rounded-b shadow  ml-5 col-4">
                                                            
                                                        </label>
                                                    </div>
                                                </div>
                                                <hr noshade="noshade" />

                                                <div class="d-flex flex-row"> 
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" name="tipoPago" 
                                                                onclick="PagoCompuesto();" id="exampleRadios6" value="6">
                                                        <label class="form-check-label" for="exampleRadios5">
                                                            Pago Compuesto -
                                                            Total: $ {{ number_format($total ,2) }}<br>
                                                        </label>
                                                        <br>
                                                    
                                                            <label class="form-check-label" id="">
                                                                Efectivo o Débito - $
                                                            </label>
                                                            
                                                            <input  type="number" 
                                                                    name="eft" 
                                                                    class="border border-primary rounded-b shadow mt-2 ml-3 col-4" 
                                                                    onchange='PagoCompuestoControl();'>
                                                            <br>
                                                            <label class="form-check-label">
                                                                Tarjeta 1 -         $
                                                            </label>

                                                            <input  type="number" 
                                                                    name="tarje1" 
                                                                    class="border border-primary rounded-b shadow mt-2 ml-20 col-4">
                                                            <br>
                                                        
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
        </div>

        <div class="container col-md-2">
            <button class="btn btn-success mt-5 align-right shadow" 
                    type="submit">
                Finalizar Venta
            </button>

         {{--    <a  href="{{ route('ventaImpresion') }}"
                class="btn btn-success mt-5 align-right shadow" >
                    Venta + Impresion
            </a> --}}
            
        </div>
    </form>
</div>

<script>
    

    function PagoCompuesto($total) {

        var tote = '<?php echo $total; ?>'
        document.detail.eft.value = tote;
    }

    function PagoCompuestoControl($total) {
        var end = '<?php echo $total; ?>'
        var cambio = document.detail.eft.value;
        var final = end - cambio;
        document.detail.tarje1.value = final;

    }
</script>
@endsection