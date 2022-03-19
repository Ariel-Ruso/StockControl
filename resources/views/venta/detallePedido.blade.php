@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
  </div>
<x-grafica img="/Storage/detalles.png" />
<br>



<div class="container mt-4 col-md-10 " name="datos">
    {{-- <h3 style="text-align:center " class="mx-5 ">
        Usuario
    </h3> --}}
    @if($errors->any())
    Hay errores
    @endif
    <form action="{{ route('finalizarVenta') }}" 
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
        <h3 
        {{-- style="text-align:center --}}
        >
            Cliente
        </h3>
        <div name="datosCliente mt-5">
            <div class="containerPagos ">

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {{-- <div name="DatosCli mt-5"> --}}
                            <div class="flex flex-col mt-1">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden detail 
                                        {{-- bg-blue-200 border-b border-gray-400 sm:rounded-lg --}}
                                        ">
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

                                                <label class="form-check-label " for="dni">
                                                    <strong>
                                                        Cta Cte:
                                                    </strong>
                                                </label>
                                                $ {{ $clie->ctaCte }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}
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
                                        <div class="shadow overflow-hidden detail
                                         bg-blue-200 border-b border-gray-400 sm:rounded-lg
                                         ">
                                            <table class="min-w-full divide-y divide-gray-200 ">
                                                <thead class="px-2 py-3 text-center">
                                                    <tr>
                                                        <th>
                                                            Artículo
                                                        </th>
                                                        <th>
                                                            Precio Unit
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
                                                        <hr noshade="noshade" 
                                                        {{-- class="mx-5"   --}}
                                                        />
                                                       {{--  <h5 class="mr-1">
                                                            Total: $ 
                                                            {{ number_format($detalle['SubTotal'],2) }} 
                                                            {{ number_format ($total, 2) }}
                                                        </h5> --}}
                                                        
                                                        <h5 class="mr-10 mt-1">
                                                            Descuento: $ - 
                                                            {{-- {{ number_format($detalle['Descuento'],2) }}   --}}
                                                        {{ $desc  }}
                                                        </h5>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    
                                                    <td colspan="12" align="right" >
                                                        
                                                        <hr noshade="noshade" 
                                                        {{-- class="mx-5"   --}}
                                                        />
                                                          
                                                        <h4 class="mr-5">
                                                            Efectivo : $ {{ number_format ($total, 2) }}
                                                        </h4>
                                                        <h4 class="mr-5">
                                                            {{-- del total con desc + 18% es total Tarj 
                                                                falta redondeo--}}
                                                            
                                                            {{-- Tarjeta :  $ {{ number_format ((($total) + (($total)* 0.18)), 2) }} --}}
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
            Forma de Pago
        </h3><br>
        <div name="datosPago mt-5">
            <div class="container ">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div name="formasPago mt-5">
                            <div class="flex flex-col mt-1">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow  detail">
                                            <div class="px-4 py-3 ">
                                                @if (Auth::user()->name == 'Geminis') 

                                                    <div class="form-check" name="check pagos">

                                                        <input class="form-check-input" type="radio" name="tipoPago" id="exampleRadios1" value="1" 
                                                                checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Efectivo <br>
                                                            
                                                        </label><br>
                                                        1 pago de $ {{ number_format( $total, 2) }}<br>
                                                        
                                                    </div>
                                                    <hr noshade="noshade" />
                                                
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tipoPago" id="exampleRadios4" value="3">
                                                        <label class="form-check-label" for="exampleRadios4">
                                                            Tarjeta Crédito Bancaria
                                                        </label>
                                                        
                                                        <br><br>
                                                                                                        
                                                        <label for="cuotas" name="fpago">
                                                            
                                                            <input type="radio" name="fpago" value="1">
                                                                
                                                                Total: $ {{ number_format($total ,2) }}
                                                                - 1 cuota (Sin interes) 
                                                                <br>
                                                            
                                                            <input type="radio" name="fpago"  value="2">
                                                                
                                                                Total $ {{ number_format($totalTar, 2) }}
                                                                - 3 cuotas - $
                                                                {{ number_format($totalTar/3, 2) }}
                                                            <br>

                                                        </label>
                                                    </div>
                                                @elseif (Auth::user()->name == 'Akihay') 

                                                    <div class="form-check" name="efectivo">

                                                        <input class="form-check-input" 
                                                                type="radio" 
                                                                name="tipoPago" 
                                                                id="exampleRadios1" 
                                                                value="1" 
                                                                checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Efectivo 
                                                            <br>
                                                        </label>
                                                        <br>
                                                        1 pago de $ {{ number_format( $total, 2) }}
                                                        <br>

                                                    </div>
                                                        
                                                    <hr noshade="noshade" />

                                                    <div class="form-check" name="ctacte">
                                                        <input class="form-check-input" 
                                                                    type="radio" 
                                                                    name="tipoPago" 
                                                                    id="exampleRadios6" 
                                                                    value="6" 
                                                                    >
                                                            <label class="form-check-label" for="exampleRadios6">
                                                                Cta Cte
                                                                <br>
                                                            </label>
                                                            <br>
                                                            $ {{ $clie->ctaCte }} + 
                                                            $ {{ number_format( $total, 2) }}
                                                            <br>
                                                    </div>
                                                    
                                                    <hr noshade="noshade" />
    
                                                    <div class="form-check" name="efect_ctacte">
                                                        
                                                            <input  class="form-check-input" 
                                                                    type="radio" 
                                                                    name="tipoPago" 
                                                                    onclick="PagoCompuesto2();" 
                                                                    id="exampleRadios7" 
                                                                    value="7">
        
                                                            <label class="form-check-label" for="exampleRadios7">
                                                                Pago Compuesto -
                                                                Total: $ {{ number_format($total ,2) }}<br>
                                                            </label>
                                                            <br>                                                                                                          
                                                                
                                                           {{-- 
                                                            <input  type="number" 
                                                                    name="noBanc" 
                                                                    id="noBanc" 
                                                                    class="border border-dark mt-2 ml-3 col-3 text-center" 
                                                                    onchange='PagoCompuesto2();' 
                                                                    > --}}
                                                            <br>
                                                            {{-- <label class="form-check-label" id=""> --}}
                                                                Efectivo - $
                                                            {{-- </label> --}}
                                                            <input  type="number" 
                                                                    name="eft7" 
                                                                    class="border border-dark mt-2 ml-3 col-3 text-center " 
                                                                    onchange='PagoCompuestoControl2();'>
                                                            <br>
                                                          
                                                            <label for="cuotas" name="cpago">
                                                                
                                                                {{-- <input type="radio" name="cpago" value="1"> --}}
                                                                     {{-- Bancaria - 1 cuota -  --}}
                                                                     Cta Cte $ -
                                                                      {{ $clie->ctaCte }} + $
        
                                                                    <input  type="number" 
                                                                            {{-- name="tarje1" --}}
                                                                            name="ctacte" 
                                                                            readonly
                                                                            class="border rounded-pill border-success 
                                                                            mt-2 ml-10 col-4 text-center">
                                                            </label>                                                    
                                                    </div>
                                                @else

                                                <div class="form-check" name="efectivo">

                                                    <input class="form-check-input" 
                                                                type="radio" 
                                                                name="tipoPago" 
                                                                id="exampleRadios1" 
                                                                value="1" 
                                                                checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Efectivo <br>
                                                        
                                                    </label><br>
                                                    1 pago de $ {{ number_format( $total, 2) }}<br>
                                                    
                                                </div>

                                                <div class="w-500"></div>
                                                <hr noshade="noshade" />

                                                <div class="form-check" name="debito">
                                                    <input  class="form-check-input" 
                                                            type="radio" 
                                                            name="tipoPago" 
                                                            id="exampleRadios2" 
                                                            value="2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Débito - <br>
                                                        
                                                    </label><br>
                                                    1 pago de $ {{ number_format($total ,2) }}
                                                </div>

                                                <hr noshade="noshade" />
                                               
                                                <div class="form-check" name="credito">
                                                    <input  class="form-check-input" 
                                                            type="radio" 
                                                            name="tipoPago" 
                                                            id="exampleRadios3" 
                                                            value="3">
                                                    <label class="form-check-label" for="exampleRadios3">
                                                        Tarjeta Crédito Bancaria
                                                    </label>
                                                    
                                                    <br><br>
                                                                                                       
                                                    <label for="cuotas" name="fpago">
                                                        
                                                        <input type="radio" name="fpago" value="1">
                                                            
                                                            Total: $ {{ number_format($total ,2) }}
                                                            - 1 cuota (Sin interes) 
                                                            <br>
                                                        
                                                        <input type="radio" name="fpago"  value="2">
                                                            
                                                            Total $ {{ number_format($totalTar, 2) }}
                                                            - 3 cuotas - $
                                                            {{ number_format($totalTar/3, 2) }}
                                                        <br>

                                                        <input type="radio" name="fpago" value="3">
                                                            
                                                            Total $ {{ number_format($totalTar, 2) }}
                                                            - 6 cuotas - $
                                                            {{ number_format($totalTar/6, 2) }}
                                                            <br>

                                                        <input type="radio" name="fpago" value="4">  
                                                          
                                                            Total $ {{ number_format($totalTar, 2) }}
                                                            - 12 cuotas - $
                                                            {{ number_format($totalTar/12, 2) }}
                                                            <br>
                                                    </label>
                                                </div>

                                                <hr noshade="noshade" />
                                                
                                                <div class="form-check" name="noBancaria">
                                                    <input  class="form-check-input" 
                                                            type="radio" 
                                                            name="tipoPago" 
                                                            id="exampleRadios4" 
                                                            value="4">
                                                    <label class="form-check-label" for="exampleRadios4">
                                                        Tarjeta Crédito <br>
                                                    </label><br>
                                                        No Bancaria - $
                                                            <input  type="number" 
                                                                    name="noBanc4" 
                                                                    class="border border-danger ml-5 col-4 text-center">
                                                    
                                                </div>

                                                <hr noshade="noshade" />

                                                <div class="form-check" name="compuesto">
                                                    <input  class="form-check-input" 
                                                            type="radio" 
                                                            name="tipoPago" 
                                                            onclick="PagoCompuesto();" 
                                                            id="exampleRadios5" 
                                                            value="5">

                                                    <label class="form-check-label" for="exampleRadios5">
                                                        Pago Compuesto -
                                                        Total: $ {{ number_format($total ,2) }}<br>
                                                    </label>
                                                    <br>    <br>                                                                                                         
                                                        
                                                    {{-- <label class="form-check-label" id=""> --}}
                                                            No Bancaria - $
                                                    {{-- </label> --}}
                                                   
                                                    <input  type="number" 
                                                            name="noBanc" 
                                                            id="noBanc" 
                                                            class="border border-dark mt-2 ml-3 col-3 text-center" 
                                                            onchange='PagoCompuesto2();' 
                                                            >
                                                    <br>
                                                    {{-- <label class="form-check-label" id=""> --}}
                                                        Efectivo o Débito - $
                                                    {{-- </label> --}}
                                                    <input  type="number" 
                                                            name="eft" 
                                                            class="border border-dark mt-2 ml-3 col-3 text-center " 
                                                            onchange='PagoCompuestoControl();'>
                                                    <br>
                                                  
                                                    <label for="cuotas" name="cpago">
                                                        
                                                        <input type="radio" name="cpago" value="1">
                                                             Bancaria - 1 cuota - $

                                                            <input  type="number" 
                                                                    name="tarje1" 
                                                                    readonly
                                                                    class="border rounded-pill border-success mt-2 ml-10 col-4 text-center">
                                                            <br>
                                                        
                                                            <input type="radio" name="cpago"  value="2">
                                                            Bancaria - 3 cuotas - $
                                                                
                                                                <input  type="number" 
                                                                        name="tarje2" 
                                                                        readonly
                                                                        class="border rounded-pill border-success mt-2 ml-6 col-4 text-center"> 
                                                                    <br>
    
                                                            <input type="radio" name="cpago" value="3">
                                                            Bancaria - 6 cuotas - $
                                                                
                                                                <input  type="number" 
                                                                        name="tarje3" 
                                                                        readonly
                                                                        class="border rounded-pill border-success mt-2 ml-6 col-4 text-center"> 
                                                                        <br>
    
                                                            <input type="radio" name="cpago" value="4">
                                                            Bancaria - 12 cuotas - $
                                                                
                                                                <input  type="number" 
                                                                        name="tarje4" 
                                                                        readonly
                                                                        class="border rounded-pill border-success mt-2 ml-6 col-4 text-center"> 
                                                                <br>
                                                    </label>
                                                    
                                                </div>

                                                <hr noshade="noshade" />

                                                <div class="form-check" name="ctacte">
                                                    <input class="form-check-input" 
                                                                type="radio" 
                                                                name="tipoPago" 
                                                                id="exampleRadios6" 
                                                                value="6" 
                                                                >
                                                        <label class="form-check-label" for="exampleRadios6">
                                                            Cta Cte
                                                            <br>
                                                        </label>
                                                        <br>
                                                        $ {{ $clie->ctaCte }} + 
                                                        $ {{ number_format( $total, 2) }}
                                                        <br>
                                                </div>
                                                
                                                <hr noshade="noshade" />

                                                <div class="form-check" name="efect_ctacte">
                                                    
                                                        <input  class="form-check-input" 
                                                                type="radio" 
                                                                name="tipoPago" 
                                                                onclick="PagoCompuesto2();" 
                                                                id="exampleRadios7" 
                                                                value="7">
    
                                                        <label class="form-check-label" for="exampleRadios7">
                                                            Pago Compuesto -
                                                            Total: $ {{ number_format($total ,2) }}<br>
                                                        </label>
                                                        <br>                                                                                                          
                                                            
                                                       {{-- 
                                                        <input  type="number" 
                                                                name="noBanc" 
                                                                id="noBanc" 
                                                                class="border border-dark mt-2 ml-3 col-3 text-center" 
                                                                onchange='PagoCompuesto2();' 
                                                                > --}}
                                                        <br>
                                                        {{-- <label class="form-check-label" id=""> --}}
                                                            Efectivo - $
                                                        {{-- </label> --}}
                                                        <input  type="number" 
                                                                name="eft7" 
                                                                class="border border-dark mt-2 ml-3 col-3 text-center " 
                                                                onchange='PagoCompuestoControl2();'>
                                                        <br>
                                                      
                                                        <label for="cuotas" name="cpago">
                                                            
                                                            {{-- <input type="radio" name="cpago" value="1"> --}}
                                                                 {{-- Bancaria - 1 cuota -  --}}
                                                                 Cta Cte $ -
                                                                  {{ $clie->ctaCte }} + $
    
                                                                <input  type="number" 
                                                                        {{-- name="tarje1" --}}
                                                                        name="ctacte" 
                                                                        readonly
                                                                        class="border rounded-pill border-success 
                                                                        mt-2 ml-10 col-4 text-center">
                                                        </label>                                                    
                                                </div>

                                                @endif
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

    //window.alert($total);
    var tote = '<?php echo $total; ?>';
    //let tote = $total;
    //var tote = $total;

    document.detail.eft.value = tote;

    document.detail.noBanc.value = tote - document.detail.eft.value;
}

function PagoCompuesto2($total) {

    var tote = '<?php echo $total; ?>';
    
    document.detail.eft7.value = tote;

    document.detail.ctacte.value = tote - document.detail.eft7.value;
}

function PagoCompuestoControl2($total) {

    let tot = '<?php echo $total; ?>'
    let eft7 = document.detail.eft7.value;
    //let ctacte= document.detail.ctacte.value; 
    let final = tot - eft7;
    document.detail.ctacte.value = final;
}

function PagoCompuestoControl($total) {

    let tot = '<?php echo $total; ?>'
    let eft = document.detail.eft.value;
    let noBanc = document.detail.noBanc.value;
    //document.detail.noBanc.value= tot - eft;
    //si a + b <> tot
    //calculo cuotas

    let final = tot - eft - noBanc;
    if (final > 0) {
        let final18 = final + (final * 0.18);
        document.detail.tarje1.value = final;
        let finalRed = redondeo2(String(final18));
        //window.alert(finalRed);
        document.detail.tarje2.value = (finalRed / 3).toFixed(2);
        document.detail.tarje3.value = (finalRed / 6).toFixed(2);
        document.detail.tarje4.value = (finalRed / 12).toFixed(2);
    }
    }
</script>

@endsection