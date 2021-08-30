<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura en PDF</title>
    <style >
		.table{
      border: 1px solid #333; 
      with: 100%;
			
		}

    .td{
    padding: 5x;
    text-align:center;
    }
			
	</style>
</head>
<body>

<br>

<div class="container mt-5">
  <div class="table table-bordered border-primary rounded">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-10">

          <table class="table table-bordered" width="100%" >
          <!-- columna izquierdawidth="250" -->
            <td style="text-align:center"
                width= 45% >
              <h4 >  
                  MUEBLERIA Y ARTICULOS DEL HOGAR<br>
              </h4>
              <div class="row justify-content-left">
                    <div name= "logo" class= "container" style="text-align:center">                            
                       <img src="Storage/her/logodet.jpg" class="img" width="250" alt=""  >
                    </div> 
              </div> 
                    <p style="font: 75% ">
                        De: Obregón Walter Eduardo<br><br>
                        Jose Maria Moreno 633<br>
                        (1759) G Catán- Pcia de Buenos Aires<br>
                        Tel: 022202-421334<br><br>
                        IVA RESPONSABLE INSCRIPTO<br>
                    </p>
					
            </td>
			<!-- columna central -->
           
            <td style="vertical-align:bottom"
            width= 10%>   
            <div class="container mt-0 mb-0">         
                <div name= "letra" class="container mb-0 ">
                    <div class="container ">
                        <img src="Storage/letraB.jpg" alt="" width="70" 
                        class= "img">        
                    </div>
                </div>
             </div>
        </td>

            <!-- columna derecha -->
            <td style="text-align:right"
                width= 5% >
              <td style="text-align:left">
                  <h3 >  
                        FACTURA<br>
                        N° {{ $nrofact }}<br>
                  </h3><br>
                  Fecha:           {{ $fecha->format('d/m/y') }}
                  
                    <p style="font: 80% " class="mt-4" >
                      C.U.I.T N°                         20-20891882-7<br>
                      INGRESOS BRUTOS:    20-20891882-7<br>
                      JUBILACION:                 20891882<br>
                      PART. MUN. N°              133700<br>
                      INICIO ACTIVIDAD:     12/12/91<br>  
                    </p>        
                </td>         
            </td>
          </table>
      </div>
    </div>      
  </div>
  

<div name= "datos cliente" class="container ">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <table class=" " width="100%"  >
        <!-- columna izquierda -->
          <td style="text-align:left" >
          <p style="font: 80% ">
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
              </p>
          </td>
<!-- columna derecha -->
          <td style="text-align:right"
            width= 10% >
            <td style="text-align:left">
              
              <p style="font: 80% ">             
                <strong>
                  DNI:
                </strong>
                    {{ $dniCli }}
              </p>
            </td>  
          </td>
        </table>
    </div>
  </div>
</div>
<!-- <hr noshade="noshade" /> -->

<div class="container ">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <table class=" " width="100%" >
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
              <?php 
                $cont= 0;
              ?>
          @foreach($items as $item)
              <tr style="font: 90% ">
                  <?php 
                      $cont ++;
                  ?>
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
              </tr>
              @endforeach
              
              <?php 
                $cont= 91 - ($cont*2);
                //revisar mas d 2 item 104, menos 108
              ?>

                      @for ($i = 1; $i <= $cont; $i++)
                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
                      @endfor      
                    </tr>
                    </tbody>
                    <tfoot>
            <!-- 
                <tr>
                    <td colspan="2"></td>
                    <td style="text-align:right"> Subtotal </td>
                    <td style="text-align:right">$ {{ $subtotal }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td align="right">Iva </td>
                    <td align="right"> $ {{ $iva }}</td>
                </tr> 
        -->
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
          </table>
        </table>
      </div>
    </div>
</div>

<table class="" width="100%" >
        <!-- columna izquierda -->
         <td style="text-align:left"> 
            <div class="img" name="QR" style="text-align:center">
            <!-- https://www.afip.gob.ar/fe/ qr/      +   $encode(el arraycito)  ->generate('https://www.afip.gob.ar/fe/ qr/' . $qrData); !!}   -->               
                <img src="data:image/svg+xml;base64,{{base64_encode($qrPdf) }}">                     
            </div>        
         </td> 
        <!-- columna central -->
        <td style="text-align:left">
          <div class="row justify-content-left">
              <img src="Storage/logo_afip.png" alt="" width="120" >
          </div>
          <div class="row justify-content-left" style="text-align:left">
            <strong >
              <p style="font: 75% ">
                Comprobante Autorizado
              </p>
            </strong>
            <p style="font: 50%">
              Esta Administración Federal no se responsabiliza por los datos 
                ingresados en el detalle de la operación.
            </p>
          </div>
        </td>
        <!-- columna der -->
        <td style="text-align:right">
          <div class="container " style="text-align:left">
          <p style="font: 70%"> 
            <strong>
                CAE N°:
            </strong>
              {{ $nrocae }}
          </p>
          </div>
          <div class="container mt-1" style="text-align:left">
            <p style="font: 70%"> 
              <strong>
                Fecha de Vto. de CAE:
              </strong><br>
              {{ $vtocae }}<br>
            </p>
          </div>
        </td>
        
      </table>

    </div>
</div>

<div class="container " style="text-align:center">
  Original
</div>


</body>
