@extends('layouts.app')

@section('content')

<div class="float-right">
	@component('components.botones')
	@endcomponent
  </div>
  <x-grafica img="/Storage/facturas.jpg" />
  
  <br><br>
  <table class= "table mt-1">
    <th>
    </th>
  </table>

<div class="container mt-5" >
  <div class="container  mb-0" 
  {{-- style= "border: 1px solid black" --}}
    >
    <div class="container mb-0 mt-5 col-md-12 " 
    style= "border: 1px solid black"
    >
    <div class="row justify-content-center mb-0">
      <div class=" mb-0">

        {{-- <div style= "border: 1px solid white" > --}}
        <table  class="container mb-0 mr-5" width="100%" >

          <!-- columna izquierda -->
          <div class="container mb-0 mt-1 mr-7" >

            <td style="text-align:center " class="mb-10 " width="43%">
            
              <h4 >  
              {{ $pro->lema }}<br>
              </h4>
            
            <div name= "logo" class="container mb-0">
              <div class="row justify-content-center">
                <img src= "{{ asset('storage/'.$pro->id.'/logodet.jpg') }}" 
                    width="250" />
              </div>
            </div>
                  <p>
                        {{ $pro->nombre }}<br><br>
                        {{ $pro->direccion }}<br>
                        {{ $pro->localidad }}<br>
                        Tel: {{ $pro->telefono }}<br><br>
                        {{ $pro->iva }}
                    </p>
            </td>
            
            {{-- <td style="text-align:center">
                <h1>B</h1>
            </td> --}}
              <!-- columna central -->
              <td style="vertical-align:bottom">   
                           
                <div class="container mt-0 mb-0">         
                        
                  <div name= "letra" class="container mb-0 ">
                    <div class="container ">
                      
                        <img src="/Storage/letraA.jpg" alt="" width="80" >
                       
                    </div>
                  </div>
                </div>
              </td>

            <!-- columna derecha -->
            <td style="text-align:right">
              <td style="text-align:left">
                  <h3 >  
                        FACTURA<br>
                        N° {{ $nrofact }}<br>
                  </h3><br>
                  Fecha:           {{ $fecha->format('d/m/y') }}
                  
                  <h6 class="mt-4">
                      C.U.I.T N°                       {{ $pro->cuit }}<br>
                      INGRESOS BRUTOS:      {{ $pro->ingbru }}<br>
                      JUBILACION:                 {{ $pro->jubilacion }}<br>
                      PART. MUN. N°              {{ $pro->partmuni }}<br>
                      INICIO ACTIVIDAD:       {{ $pro->iniactiv }} 
                    </h6>        
                </td>         
            </td>
          </table>
      </div>
    </div>      
  </div>

<div class="container mt-0"
style= "border: 1px solid black" 
>
  <div class="row justify-content-center">
    <div class="col-md-12">
      <table class=" " width="100%" 
        
        >

        <!-- columna izquierda -->
          <td style="text-align:left">
            <strong>
              Señor/es: 
          </strong>
                    {{ $nombreCli }}           
         <br><br>
         <strong>
              Domicilio:
          </strong>
                   {{ $direccionCli }}
         <br><br>
          <strong>
              IVA:
          </strong>
                             Consumidor Final
          <br><br>
          <strong>
              Condic. Venta:
          </strong>
            Contado
<!-- columna derecha -->
          <td style="text-align:right"
              width= 15%>
            <td style="text-align:left">
                 
                <strong>
                  DNI:
                </strong>
                    {{ $dniCli }}
            </td>  
          </td>
        </table>
    </div>
  </div>
</div>


<div class="container mt-0"
style= "border: 1px solid black" 
>
<div class="row justify-content-center">
  <div class="col-md-12">
        <!-- <table class=" " width="100%" > -->
        <table class="table table-bordered"  style="text-align:center" width="100%" >
          <thead style="background-color: lightgray;">
            <tr>
              <th>Cantidad</th>
              <th>Descripción</th>
              <th>Precio Unitario </th>
              <th>Importe </th>
            </tr>
          </thead>
          <tbody >
            <tr>
            @foreach($items as $item)
              <td style="text-align:center">
                    {{ $item->cantidad }}
              </td>
              
              <td style="text-align:center">
                    {{ $item->descripcion }}
              </td>
              
              <td style="text-align:center">
                    @if ( ($tipoPago) == 5)
                        {{ " - "   }}
                    @else
                        $ {{ $item->precioUnit }}
                    @endif
              </td>
              <td style="text-align:center">
                    @if ( ($tipoPago) == 5)
                        {{ " - "   }}
                      @else
                        $ {{ $item->precioUnit *  $item->cantidad }}
                      @endif
               </td>
              
              <tr>
            </tr>
            @endforeach
            <tr>
              <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          <tfoot>
               <tr>
                  <td colspan="2"></td>
                  <td style="text-align:right"> Subtotal </td>
                  <td style="text-align:center">$ {{ $subtotal }}</td>
              </tr>
              <tr>
                  <td colspan="2"></td>
                  <td align="right">Iva </td>
                  <td align="center"> $ {{ $iva }}</td>
              </tr>
              <tr>
                  <td colspan="2"></td>
                  <td style="text-align:right">
                    <strong>
                        Total 
                    </strong>
                  </td>
                  <td style="text-align:center" class="gray"> 
                    $ {{ $total }}
                  </td>
              </tr>
          </tfoot>  
        <!-- </table> -->
        </table>

<hr noshade="noshade" />

</div>

    <table class="" width="100%" >
        <!-- columna izquierda -->
        <td style="text-align:left">
          <div class="container" name="QR" style="text-align:left">
          <!-- https://www.afip.gob.ar/fe/ qr/      +   $encode(el arraycito)    -->
            {!! QrCode::size(150)
                ->generate('https://www.afip.gob.ar/fe/ qr/' . $qrData); !!}                
          </div>
        </td>
        <!-- columna central -->
        <td style="text-align:center">
          <div class="row justify-content-right">
              <img src="/Storage/logo_afip.png" alt="" width="150" >
          </div>
          <div class="row justify-content-left">
            <strong >
              <p class= "font-italic">
                Comprobante Autorizado
              </p>
            </strong>
            <p class="font-italic text-xs">
              Esta Administración Federal no se responsabiliza por los datos 
                ingresados en el detalle de la operación.
            </p>
          </div>
        </td>
        <!-- columna izq -->
        <td style="text-align:right">
          <div class="container " style="text-align:left">
            <strong>
              CAE N°:
            </strong>
            {{ $nrocae }}<br>
          </div>
          <div class="container " style="text-align:left">
            <strong>
              Fecha de Vto. de CAE:
            </strong><br>
              {{ $vtocae }}<br>
          </div>
        </td>
        
      </table>
      </div>
    </div>
</div>
<div class="container " style="text-align:center">
  Original
    
</div>
<br>
<br>
<div class="container">
  <a href=" {{ route ('imprimirFactPdfA',$id) }}" class="btn btn-primary" >
        Imprimir pdf
    </a>
</div>

@endsection
