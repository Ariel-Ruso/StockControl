<!DOCTYPE html>
<html lang="es">
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
    
         
<div class="container mt-1">
  <div class="table table-bordered border-primary rounded">

    <div class="container p-1">
      <div class="row justify-content-center">
            <div class="col-md-12 ">

                <table class="table table-bordered table-responsive" width="100%" >
                    <!-- columna izquierda -->
                    
                    <td style="text-align:center" 
                        width= 45%>
                        <h5>  
                            {{ $pro->lema }}
                        </h5>
                        <div class="row justify-content-left">
                            <div name= "logo" class= "container" style="text-align:center">                            
                                <img src= "{{ $src }}" class="img" width="100"  />
                            </div> 
                        </div > 
                                <p style="font: 80% ">
                                    
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
                                <h3 style="font: 90% ">  
                                        REMITO<br>
                                        N° {{ $nremit }}<br>
                                </h3><br>
                                Fecha:           {{ $fecha->format('d/m/y') }}
                            
                                <h6 class="mt-2">
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

    <div class="container p-1" >
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <table class="table table-bordered " width="100%"  >
                <!-- columna izquierda -->
                    <td style="text-align:left">
                        <p style="font: 80% ">         
                            <strong>
                                 Cliente:     
                            </strong>
                                     {{ $clie->dni }}           
                            <br><br>
                            <strong>
                            Razon Social:     
                            </strong>
                           {{ $clie->nombre }}
                            <br><br>
                            <strong>
                            Domicilio:     
                            </strong>
                                {{ $clie->direccion }}
                            <br>
                        </p>
                <!-- columna derecha -->
                    <td style="text-align:left">
                        <p style="font: 80% ">   
                            <strong>
                            Cta Cte:     
                            </strong>
                                    $ {{ $clie->ctaCte }}
                        </p>    
                    </td>
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-1">
        <div class="row justify-content-center mt-1">
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
                                        {{-- @if($item->imei != "")
                                            / IMEI: 
                                            {{ $item->imei }}
                                        @endif --}}
                                        
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
                                    $cont= 88- ($cont*2);
                                    //revisar mas d 2 item 104, menos 108
                                
                                ?>
                        {{-- @if($items->count() > 14)
                            @for ($i = 1; $i <= 20 + $items->count() ; $i++)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> 
                            @endfor--}}
                        @if($items->count() > 5)
                            @for ($i = 1; $i <= 30 + $items->count() ; $i++)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor
                        
                        @else    
                        {{-- muchos items para akihay --}}
                            @for ($i = 1; $i <=  $items->count() + $cont + 25 ; $i++)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor                               

                        @endif
                        
                        </tr>
                    </tbody>
                    <tfoot style="font: 80% ">
                        <tr >
                            @if (Auth::user()->name == 'Akihay')
                                <td colspan="2"></td>
                                
                                <td style="text-align:right">
                                    <strong>
                                        Cta Cte Anterior:
                                    </strong>
                                </td>
                                
                                <td style="text-align:center" class="gray"> 
                                    $ {{ $clie->ctaCte }}
                                </td>
                                <tr>
                                    <td colspan="2"></td>
                                    <td style="text-align:right">
                                        <strong>
                                            Total Boleta
                                        </strong>
                                    </td>
                                    <td style="text-align:center" class="gray"> 
                                        $ {{ $total }}
                                    </td>
                                </tr> 
                                {{-- </tr> --}}
                                <tr>
                                    <td colspan="2"></td>
                                    <td style="text-align:right">
                                    <strong>
                                        Paga Efectivo:
                                    </strong>
                                    </td>
                                
                                    <td style="text-align:center" class="gray"> 
                                        @if ( ( $tipoPago == 1) || ($tipoPago == 2 ) || ($tipoPago == 5 ) || ($tipoPago == 51)
                                            || ($tipoPago == 52) || ($tipoPago == 53) || ($tipoPago == 54) || ($tipoPago == 7))
                                            $ {{ $eft + $desc}}
                                        @else
                                            $ 0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td style="text-align:right">
                                        <strong>
                                        Cta Cte Actual:
                                        </strong>
                                    </td>
                                    
                                    <td style="text-align:center" class="gray"> 
                                        
                                        $ {{ ($eft + $desc) - $total + $clie->ctaCte}}
                                    </td>
                                </tr>   
                            @else
                            
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                <strong>
                                    Efectivo:
                                </strong>
                                </td>
                            
                                <td style="text-align:center" class="gray"> 
                                @if ( ( $tipoPago == 1) || ($tipoPago == 2 ) || ($tipoPago == 5 ) || ($tipoPago == 51)
                                    || ($tipoPago == 52) || ($tipoPago == 53) || ($tipoPago == 54) )
                                    $ {{ $eft + $desc}}
                                @else
                                    $ 0
                                @endif
                                </td>
                            
                                </tr>
                                
                                <tr>
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                    <strong>
                                        T Bancaria:
                                    </strong>
                                </td>
                                
                                    <td style="text-align:center" class="gray"> 
                                    @if ( ($tipoPago == 31) || ($tipoPago == 51) )
                                    1 cuota:
                                        $ {{ $tBanc - $desc}}
                                    @elseif ($tipoPago==32)  
                                        3 cuotas:
                                        $ {{ number_format( ($tBanc- $desc)/3, 2) }}
                                    @elseif($tipoPago == 33)  
                                        6 cuotas:
                                        $ {{ number_format( ($tBanc- $desc)/6, 2) }}
                                    @elseif($tipoPago == 34)  
                                        12 cuotas:
                                        $ {{ number_format( ($tBanc- $desc)/12, 2) }}
                                    @elseif( $tipoPago == 52)
                                        3 cuotas:
                                        $ {{ number_format( ($tBanc- $desc), 2) }}
                                    @elseif( $tipoPago == 53)
                                        6 cuotas:
                                        $ {{ number_format( ($tBanc- $desc), 2) }}
                                    @elseif( $tipoPago == 54)
                                        12 cuotas:
                                        $ {{ number_format( ($tBanc- $desc), 2) }}
                                    @else
                                        $ 0
                                    @endif
                                    </td>

                                </tr>
                                
                                <tr>
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                    <strong>
                                        T No Bancaria:
                                    </strong>
                                </td>
                                
                                    <td style="text-align:center" class="gray"> 
                                    @if ( ($tipoPago == 4) || ($tipoPago == 5) || ($tipoPago == 51) || ($tipoPago == 52) 
                                        || ($tipoPago == 53) || ($tipoPago == 54))
                                        $ {{  $tnoBanc }}
                                    @else
                                        $ 0
                                    @endif
                                    </td>
                                
                                </tr>
                            @endif
                            @if (Auth::user()->name != 'Akihay')   
                                <tr>
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                    <strong>
                                        Descuento:
                                    </strong>
                                </td>
                                <td style="text-align:center" class="gray"> 
                                - $ {{ $desc  }}
                                </td>
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
                            @endif


                        {{-- 
                            <td colspan="2"></td>
                            <td style="text-align:right">
                            <strong>
                                Descuento:
                            </strong>
                            </td>
                            <td style="text-align:center" class="gray"> 
                                
                                
                                {{ $desc}}
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
                        --}}


                    </tfoot>  
                </table>
            
                <div>
                    <div class="container mt-1 " style="text-align:left">
                            Firma: 
                        <br>
                            Aclaración:
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


<div class="container mt-1">
  <div class="table table-bordered border-primary rounded">

    <div class="container p-1">
      <div class="row justify-content-center">
            <div class="col-md-12 ">

                <table class="table table-bordered table-responsive" width="100%" >
                    <!-- columna izquierda -->
                    
                    <td style="text-align:center" 
                        width= 45%>
                        <h5>  
                            {{ $pro->lema }}
                        </h5>
                        <div class="row justify-content-left">
                            <div name= "logo" class= "container" style="text-align:center">                            
                                <img src= "{{ $src }}" class="img" width="100"  />
                            </div> 
                        </div > 
                                <p style="font: 80% ">
                                    
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
                                <h3 style="font: 90% ">  
                                        REMITO<br>
                                        N° {{ $nremit }}<br>
                                </h3><br>
                                Fecha:           {{ $fecha->format('d/m/y') }}
                            
                                <h6 class="mt-2">
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

    <div class="container p-1" >
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <table class="table table-bordered " width="100%"  >
                <!-- columna izquierda -->
                    <td style="text-align:left">
                        <p style="font: 80% ">         
                            <strong>
                                 Cliente:     
                            </strong>
                                     {{ $clie->dni }}           
                            <br><br>
                            <strong>
                            Razon Social:     
                            </strong>
                           {{ $clie->nombre }}
                            <br><br>
                            <strong>
                            Domicilio:     
                            </strong>
                                {{ $clie->direccion }}
                            <br>
                        </p>
                <!-- columna derecha -->
                    <td style="text-align:left">
                        <p style="font: 80% ">   
                            <strong>
                            Cta Cte:     
                            </strong>
                                    $ {{ $clie->ctaCte }}
                        </p>    
                    </td>
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-1">
        <div class="row justify-content-center mt-1">
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
                                        {{-- @if($item->imei != "")
                                            / IMEI: 
                                            {{ $item->imei }}
                                        @endif --}}
                                        
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
                                    $cont= 88- ($cont*2);
                                    //revisar mas d 2 item 104, menos 108
                                
                                ?>
                        {{-- @if($items->count() > 14)
                            @for ($i = 1; $i <= 20 + $items->count() ; $i++)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr> 
                            @endfor--}}
                        @if($items->count() > 5)
                            @for ($i = 1; $i <= 30 + $items->count() ; $i++)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor
                        
                        @else    
                        {{-- muchos items para akihay --}}
                            @for ($i = 1; $i <=  $items->count() + $cont + 25 ; $i++)
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor                               

                        @endif
                        
                        </tr>
                    </tbody>
                    <tfoot style="font: 80% ">
                        <tr >
                            @if (Auth::user()->name == 'Akihay')
                                <td colspan="2"></td>
                                
                                <td style="text-align:right">
                                    <strong>
                                        Cta Cte Anterior:
                                    </strong>
                                </td>
                                
                                <td style="text-align:center" class="gray"> 
                                    $ {{ $clie->ctaCte }}
                                </td>
                                <tr>
                                    <td colspan="2"></td>
                                    <td style="text-align:right">
                                        <strong>
                                            Total Boleta
                                        </strong>
                                    </td>
                                    <td style="text-align:center" class="gray"> 
                                        $ {{ $total }}
                                    </td>
                                </tr> 
                                {{-- </tr> --}}
                                <tr>
                                    <td colspan="2"></td>
                                    <td style="text-align:right">
                                    <strong>
                                        Paga Efectivo:
                                    </strong>
                                    </td>
                                
                                    <td style="text-align:center" class="gray"> 
                                        @if ( ( $tipoPago == 1) || ($tipoPago == 2 ) || ($tipoPago == 5 ) || ($tipoPago == 51)
                                            || ($tipoPago == 52) || ($tipoPago == 53) || ($tipoPago == 54) || ($tipoPago == 7))
                                            $ {{ $eft + $desc}}
                                        @else
                                            $ 0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td style="text-align:right">
                                        <strong>
                                        Cta Cte Actual:
                                        </strong>
                                    </td>
                                    
                                    <td style="text-align:center" class="gray"> 
                                        
                                        $ {{ ($eft + $desc) - $total + $clie->ctaCte}}
                                    </td>
                                </tr>   
                            @else
                            
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                <strong>
                                    Efectivo:
                                </strong>
                                </td>
                            
                                <td style="text-align:center" class="gray"> 
                                @if ( ( $tipoPago == 1) || ($tipoPago == 2 ) || ($tipoPago == 5 ) || ($tipoPago == 51)
                                    || ($tipoPago == 52) || ($tipoPago == 53) || ($tipoPago == 54) )
                                    $ {{ $eft + $desc}}
                                @else
                                    $ 0
                                @endif
                                </td>
                            
                                </tr>
                                
                                <tr>
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                    <strong>
                                        T Bancaria:
                                    </strong>
                                </td>
                                
                                    <td style="text-align:center" class="gray"> 
                                    @if ( ($tipoPago == 31) || ($tipoPago == 51) )
                                    1 cuota:
                                        $ {{ $tBanc - $desc}}
                                    @elseif ($tipoPago==32)  
                                        3 cuotas:
                                        $ {{ number_format( ($tBanc- $desc)/3, 2) }}
                                    @elseif($tipoPago == 33)  
                                        6 cuotas:
                                        $ {{ number_format( ($tBanc- $desc)/6, 2) }}
                                    @elseif($tipoPago == 34)  
                                        12 cuotas:
                                        $ {{ number_format( ($tBanc- $desc)/12, 2) }}
                                    @elseif( $tipoPago == 52)
                                        3 cuotas:
                                        $ {{ number_format( ($tBanc- $desc), 2) }}
                                    @elseif( $tipoPago == 53)
                                        6 cuotas:
                                        $ {{ number_format( ($tBanc- $desc), 2) }}
                                    @elseif( $tipoPago == 54)
                                        12 cuotas:
                                        $ {{ number_format( ($tBanc- $desc), 2) }}
                                    @else
                                        $ 0
                                    @endif
                                    </td>

                                </tr>
                                
                                <tr>
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                    <strong>
                                        T No Bancaria:
                                    </strong>
                                </td>
                                
                                    <td style="text-align:center" class="gray"> 
                                    @if ( ($tipoPago == 4) || ($tipoPago == 5) || ($tipoPago == 51) || ($tipoPago == 52) 
                                        || ($tipoPago == 53) || ($tipoPago == 54))
                                        $ {{  $tnoBanc }}
                                    @else
                                        $ 0
                                    @endif
                                    </td>
                                
                                </tr>
                            @endif
                            @if (Auth::user()->name != 'Akihay')   
                                <tr>
                                <td colspan="2"></td>
                                <td style="text-align:right">
                                    <strong>
                                        Descuento:
                                    </strong>
                                </td>
                                <td style="text-align:center" class="gray"> 
                                - $ {{ $desc  }}
                                </td>
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
                            @endif


                        {{-- 
                            <td colspan="2"></td>
                            <td style="text-align:right">
                            <strong>
                                Descuento:
                            </strong>
                            </td>
                            <td style="text-align:center" class="gray"> 
                                
                                
                                {{ $desc}}
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
                        --}}


                    </tfoot>  
                </table>
            
                <div>
                    <div class="container mt-1 " style="text-align:left">
                            Firma: 
                        <br>
                            Aclaración:
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>


</body>