@extends('layouts.app')

@section('content')

@component('components.volver')
@endcomponent

@component('components.mensajes')
@endcomponent
    
    <div class="container mt-4 " name= "datos">
        <h3 style="text-align:center" >
            Usuario
        </h3>
        <form   action= "{{ route('finalizarVenta') }}" 
                method="POST"
                >
                @csrf
            <div name="datosUser mt-5">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="flex flex-col mt-1">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead>
                                                <tr>
                                                    <th class="px-6 py-3 bg-gray-150 text-left text-xs leading-4 font-medium text-gray-800 uppercase tracking-wider">
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
            <h3 style="text-align:center">
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
                                            <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
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
                                            <div class="shadow overflow-hidden border-b border-gray-400 sm:rounded-lg">
                                                <div class="px-2 py-3 ">
                                                    <div class="form-check" name="check pagos">                                               
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios1" 
                                                                value="1" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Efectivo  <br>
                                                            1 pago de $ {{ number_format( $total, 2) }}<br>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios2" 
                                                                value="2">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                         Debito  -  <br>
                                                            1 pago de $ {{  number_format($total ,2) }}
                                                        </label>
                                                        <!-- <div class="col-md-2">
                                                            <input  type="integer"
                                                                    name="debito"
                                                                    placeholder="recargo"
                                                                    class="form-control mb-2"
                                                            />  %
                                                        </div> -->
                                                        
                                                    </div>
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios3" 
                                                                value="3">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            Tarjeta Credito -  
                                                            <br> 1 pago
                                                            Total: $ {{  number_format($total ,2) }}<br>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios4" 
                                                                value="4">
                                                        <label class="form-check-label" for="exampleRadios4">
                                                            Tarjeta Credito - <br>
                                                             Mas de 1 pago
                                                            Total: $ {{  number_format($total + ($total*0.18) ,2) }}<br>
                                                            12 cuotas  $ {{  number_format( ($total + ($total*0.18) )/12 ,2) }}<br>
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios5" 
                                                                value="5">
                                                        <label class="form-check-label" for="exampleRadios5">
                                                            Tarjeta Credito <br>
                                                            No Bancaria- 
                                                        </label>
                                                        <input type="integer" class=" border rounded-br">
                                                        </input>
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

<div name="first Data" class="container ">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <iframe src="https://www.firstdata.com.ar/simulador.html
                        " width="900" height="600" frameborder="0"></iframe>
            </div>
        </div>
</div>

@endsection