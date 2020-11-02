<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Compra') }}
        </h2>
    </x-slot>
    <br>
    <h3 align="center">
        Usuario
    </h3>
    <div name="datosUser mt-5">
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
    <br>
    <h3 align="center">
        Articulos
    </h3><br>
    <div name="datosArts mt-5">
        <div class="flex flex-col mt-1">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead>
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
                               SubTotal
                            </th>
                        </tr>    
                    </thead>
                    
                        @foreach ($carrito as $detalle)    
                        <tbody>
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
    <br>
    <h3 align="center">
        Forma De Pago
    </h3><br>
    <div name="formasPago mt-5">
        <div class="flex flex-col mt-1">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="form-check" name="check pagos">
                        <input  class="form-check-input" type="radio" 
                                name="exampleRadios" id="exampleRadios1" 
                                value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                        Efectivo 
                        </label>
                    </div>
                    <div class="form-check">
                        <input  class="form-check-input" type="radio" 
                                name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                        Debito (20 % recargo)
                        </label>
                    </div>
                    <div class="form-check">
                        <input  class="form-check-input" type="radio" 
                                name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                        Credito (Ahora 12 y 18)
                        </label>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div name="pagos" class="mt-5" align="center" >
        <a   href=" {{ route ('verCarrito') }}"
            class="btn btn-warning"> 
                Ver carrito 
        </a>    
        <a  href="https://www.paypal.com" 
            class="btn btn-primary" >
                Paypal
        </a>
    </div>

</x-app-layout>