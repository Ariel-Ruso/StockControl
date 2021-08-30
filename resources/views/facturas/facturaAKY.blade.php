@extends('layouts.app')

@section('content')

<div class="container col-md-2 mx-auto" name= "grafica">
            <div class="row justify-content-center ">
                    <div class="container mx-auto ">
                        <img src="/Storage/facturas.jpg" height="400" width="250" >
                    </div>
            </div>      
</div>    

@component('components.inicio-btn')
@endcomponent

@component('components.mensajes')
@endcomponent


<div class="container mt-5" >
  <div class="table table-bordered border-primary rounded">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-10">

          <table class="" width="100%" >
          <!-- columna izquierda -->
            <td style="text-align:center">
            <div name= "logo" class="container ">
              <div class="row justify-content-center">
                  <img src="/Storage/aky/logodet.jpg" alt="" width="250" >
              </div>
            </div>
              <h4 >  
                  MUEBLERIA Y ARTICULOS DEL HOGAR<br>
              </h4>
                    <p>
                        De: Obregón Walter Eduardo<br><br>
                        Jose Maria Moreno 633<br>
                        (1759) G Catán- Pcia de Buenos Aires<br>
                        Tel: 022202-421334<br><br>
                        IVA RESPONSABLE INSCRIPTO<br>
                    </p>
            </td>
            <!-- columna central -->
            <td style="text-align:center">
                <h1>B</h1>
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
                      C.U.I.T N°                       20-20891882-7<br>
                      INGRESOS BRUTOS:      20-20891882-7<br>
                      JUBILACION:                  20891882<br>
                      PART. MUN. N°              133700<br>
                      INICIO ACTIVIDAD:       12/12/91<br>  
                    </h6>        
                </td>         
            </td>
          </table>
      </div>
    </div>      
  </div>
  <hr noshade="noshade" />

<div class="container ">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <table class=" " width="100%"  >
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
              <br><br><br><br>              
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
<hr noshade="noshade" />

  <div class="container ">
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
              <!-- <tr>
                  <td colspan="2"></td>
                  <td style="text-align:right"> Subtotal </td>
                  <td style="text-align:right">$ {{ $subtotal }}</td>
              </tr>
              <tr>
                  <td colspan="2"></td>
                  <td align="right">Iva </td>
                  <td align="right"> $ {{ $iva }}</td>
              </tr> -->
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
  <a href=" {{ route ('imprimirFactPDF',$id) }}" class="btn btn-primary" >
        Imprimir pdf
    </a>
</div>

@endsection
