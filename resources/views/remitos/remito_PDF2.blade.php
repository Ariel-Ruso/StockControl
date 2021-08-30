<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale= 0.5">
    <title>Remito en PDF</title>
    <style >
		.table{
            border: 1px solid #333; 
            /* with: 100%; */
                }
            .td{
            
            }
			
	</style>
</head>
<body>
   
    <br>
    
<div class="container mt-5">
  <div class="table table-bordered border-primary rounded">

    <div class="container ">
      <div class="row justify-content-center">
            <div class="col-md-12">

                <table class="table table-bordered table-responsive" width="100%" >
                    <!-- columna izquierda -->
                    
                    <td style="text-align:center" 
                        width= 45%>
                        <h4 >  
                            {{ $pro->lema }}
                        </h4>
                        <div class="row justify-content-left">
                            <div name= "logo" class= "container" style="text-align:center">                            
                                <img src= "{{ $src }}" class="img" width="200"  />
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
                    
                    <!-- columna central -->
                                        
                    <td style="vertical-align:bottom"
                        width= 10%>   
                        <div class="container mt-0 mb-0">         
                            <div name= "letra" class="container mb-0 ">
                                <div class="container ">
                                    <img src="Storage/letraX.jpg" alt="" width="70" 
                                        class= "img">        
                                </div>
                            </div>
                         </div>
                    </td>
                    
                    <!-- columna derecha -->
                        
                    <td style="text-align:center"
                        width=  5% 
                        >
                            <td style="text-align:left">
                                <h3 >  
                                        REMITO<br>
                                        N° {{ $nremit }}<br>
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

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-bordered" width="100%"  >
                <!-- columna izquierda -->
                    <td style="text-align:left">
                        <p style="font: 80% ">         
                            <strong>
                                 Cliente:     
                            </strong>
                                     {{ $dniCli }}           
                            <br><br>
                            <strong>
                            Razon Social:     
                            </strong>
                           {{ $nombreCli }}
                            <br><br>
                            <strong>
                            Domicilio:     
                            </strong>
                                {{ $direccionCli }}
                            <br><br>
                        </p>
                <!-- columna derecha -->
                </table>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-12">
            
                <table class="table table-bordered"  style="text-align:center" width="100%" >
                    <thead style="background-color: lightgray;">
                        <tr>
                            <th>Cantidad</th>
                            <th>Artículo</th>
                            <th>Precio Unitario<</th>
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
                                    $cont= 100- ($cont*2);
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
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right">
                              <strong>
                                  Descuento:
                              </strong>
                            </td>
                            <td style="text-align:center" class="gray"> 
                                
                                {{ $total - ($item->precioUnit *  $item->cantidad)  }}
                            </td>
                          </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right">
                            <strong>
                                Total: 
                            </strong>
                            </td>
                            <td style="text-align:center" class="gray">
                                $ {{ $total }}
                             </td>
                        </tr>
                    </tfoot>  
                </table>
            
                <div>
                    <div class="container mt-1 " style="text-align:left">
                            Firma: 
                        <br><br>
                            Aclaración:
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

   
<div class="container mt-5">
    <div class="table table-bordered border-primary rounded">
  
      <div class="container ">
        <div class="row justify-content-center">
              <div class="col-md-12">
  
                  <table class="table table-bordered table-responsive" width="100%" >
                      <!-- columna izquierda -->
                      
                      <td style="text-align:center" 
                          width= 45%>
                          <h4 >  
                              {{ $pro->lema }}
                          </h4>
                          <div class="row justify-content-left">
                              <div name= "logo" class= "container" style="text-align:center">                            
                                  <img src= "{{ $src }}" class="img" width="200"  />
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
  
                      <!-- columna central -->
                                          
                      <td style="vertical-align:bottom"
                          width= 10%>   
                          <div class="container mt-0 mb-0">         
                              <div name= "letra" class="container mb-0 ">
                                  <div class="container ">
                                      <img src="Storage/letraX.jpg" alt="" width="70" 
                                          class= "img">        
                                  </div>
                              </div>
                           </div>
                      </td>
                      
                      <!-- columna derecha -->
                      
                      <td style="text-align:center"
                          width=  5% 
                          >
                              <td style="text-align:left">
                                  <h3 >  
                                          REMITO<br>
                                          N° {{ $nremit }}<br>
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
  
      <div class="container ">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <table class="table table-bordered" width="100%"  >
                  <!-- columna izquierda -->
                      <td style="text-align:left">
                          <p style="font: 80% ">         
                              <strong>
                                   Cliente:     
                              </strong>
                                       {{ $dniCli }}           
                              <br><br>
                              <strong>
                              Razon Social:     
                              </strong>
                             {{ $nombreCli }}
                              <br><br>
                              <strong>
                              Domicilio:     
                              </strong>
                                  {{ $direccionCli }}
                              <br><br>
                          </p>
                  <!-- columna derecha -->
                  </table>
              </div>
          </div>
      </div>
  
      <div class="container ">
          <div class="row justify-content-center">
              <div class="col-md-12">
              
                  <table class="table table-bordered"  style="text-align:center" width="100%" >
                      <thead style="background-color: lightgray;">
                          <tr>
                              <th>Cantidad</th>
                              <th>Artículo</th>
                              <th>Precio Unitario<</th>
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
                                      $cont= 100- ($cont*2);
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
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right">
                              <strong>
                                  Descuento:
                              </strong>
                            </td>
                            <td style="text-align:center" class="gray"> 
                                
                                {{ $total - ($item->precioUnit *  $item->cantidad)  }}
                            </td>
                          </tr>
                          <tr>
                              <td colspan="2"></td>
                              <td style="text-align:right">
                              <strong>
                                  Total: 
                              </strong>
                              </td>
                              <td style="text-align:center" class="gray">
                                  $ {{ $total }}
                               </td>
                          </tr>
                      </tfoot>  
                  </table>
              
                  <div>
                      <div class="container mt-1 " style="text-align:left">
                              Firma: 
                          <br><br>
                              Aclaración:
                          <br><br>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

</body>