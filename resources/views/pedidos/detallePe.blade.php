@extends('layouts.app')

@section('content')

@component('components.inicio-btn')
@endcomponent

@component('components.mensajes')
@endcomponent
    
    <div class="container mt-4 col-md-10 " name= "datos">
        <h3 style="text-align:center " class= "mx-5 ">
               Usuario
        </h3>
        @if($errors->any())
                    Hay errores
        @endif                
        <form   action= "{{ route('createP') }}" 
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
                                                               
                                                    {{ $clie->dni }}
                                                    <br>                            
                                                    
                                                    <label class="form-check-label" for="apellidoyNombre">
                                                    <strong>
                                                            Apellido y Nombre: 
                                                            </strong>
                                                    </label>
                                                    
                                                    
                                                    {{ $clie->nombre }}
                                                    
                                                    <br>  
                                                    
                                                    <label class="form-check-label" for="domicilioCliente">
                                                    <strong>
                                                        Domicilio: 
                                                        </strong>
                                                    </label>
                                                   
                                                    
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
                                                    <thead>
                                                    <tr>
                                                        <th class="px-2 py-3 text-center">
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
                                                        <tbody>
                                                        <th class="px-2 py-3" 
                                                            >
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
                                                    <div class="w-500"></div>
                                                    <hr noshade="noshade" />
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios2" 
                                                                value="2">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                         Débito  -  <br>
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
                                                    <hr noshade="noshade" />
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios3" 
                                                                value="3">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            Tarjeta Crédito -  
                                                            <br> 1 pago
                                                            Total: $ {{  number_format($total ,2) }}<br>
                                                        </label>
                                                    </div>
                                                    <hr noshade="noshade" />
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios4" 
                                                                value="4">
                                                        <label class="form-check-label" for="exampleRadios4" >
                                                            Tarjeta Crédito  + 18 %                                                           
                                                        </label >      
                                                        <!-- <input  type="number"  name="noBancaria4" class="border border-primary" >
                                                        </input> -->
                                                            <br>
                                                            Total $ {{ number_format($total + ($total*0.18), 2) }} -
                                                            12 cuotas  $ {{ number_format( ($total + ($total*0.18) )/12 ,2)  }}
                                                            <br>
                                                        </label>
                                                    </div>
                                                    <hr noshade="noshade" />
                                                    <div class="form-check">
                                                        <input  class="form-check-input" type="radio" 
                                                                name="tipoPago" id="exampleRadios5" 
                                                                value="5">
                                                        <label class="form-check-label" for="exampleRadios5">
                                                            Tarjeta Crédito <br>
                                                            No Bancaria- 
                                                        </label>
                                                        <input type="number"  name="noBancaria5" class="border border-primary">
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
                <button class="btn btn-success mt-5 align-right" 
                        type="submit">
                            Finalizar Pedido
                </button>
            </div>
        </form>
</div>


@endsection