@extends('layouts.app')

@section('content')
{{-- <style >
  .container {
    /* width: 90%;
    height: 90%; */
  }
</style> --}}

<div class="float-right">
  @component('components.botones')
  @endcomponent
</div>

{{-- <x-grafica img="/Storage/remitos.png" /> --}}
<h2>
  Remitos
</h2>
<br>
<table class= "table mb-1 "> 
  <th>
    </th>
      
</table>     


{{-- 
<div class="container mt-1 ">
  <a href="{{ route('create') }}" 
          
          class= "border-solid border-2 bg-red-200 border-light-blue-200
                shadow-md text-x1 float-right
                hover:font-medium hover:bg-green-300 hover:text-black 
                transform hover:scale-120 transition duration-700 inline-block
                rounded-full py-2 px-2">
               Reclamos
   </a>
   <br>
</div> --}}



<div class="container mt-5 " >
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
                {{ $pro->lema }}
                
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
          </div>

            <!-- columna central -->
            <td style="vertical-align:bottom">   
                           
              <div class="container mt-0 mb-0">         
                      
                <div name= "letra" class="container mb-0 ">
                  <div class="container ">
                    
                      <img src="/Storage/letraX.jpg" alt=""
                       {{-- width="80" --}}
                      
                       {{-- class="letraFact" --}}
                       >
                     
                  </div>
                </div>
              </div>
            </td>
          
            <!-- columna derecha -->
            {{-- <td style="text-align:right"> --}}
              <td style="text-align:left">
                  <h3 >  
                        REMITO<br>
                        N° {{ $nremit }}<br>
                  </h3><br>
                  Fecha:           {{ $fecha->format('d/m/y') }}
                  
                    <h6 class="mt-4">
                      {{-- C.U.I.T N°                       20-20891882-7<br> --}}
                      C.U.I.T N°                       {{ $pro->cuit }}<br>
                      {{-- INGRESOS BRUTOS:      20-20891882-7<br> --}}
                      INGRESOS BRUTOS:      {{ $pro->ingbru }}<br>
                      {{-- JUBILACION:                 20891882<br> --}}
                      JUBILACION:                 {{ $pro->jubilacion }}<br>
                      {{-- PART. MUN. N°              133700<br> --}}
                      PART. MUN. N°              {{ $pro->partmuni }}<br>
                      {{-- INICIO ACTIVIDAD:       12/12/91  --}}
                      INICIO ACTIVIDAD:       {{ $pro->iniactiv }} 
                    </h6>        
                </td>         
            {{-- </td> --}}
          </table>

        {{-- </div>     --}}
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
            <strong> Cliente:     
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
            <!-- <strong>
                Condic. Venta:
            </strong>
              Contado
          </td> -->
<!-- columna derecha -->
         
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
        <th>Artículo</th>
        <th>Precio Unitario</th>
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
            
              @if($item->imei != "")
                / IMEI: 
                {{ $item->imei }}
              @endif
              @if($item->numero != "")
                /  
                
                n°
                {{ $nums [$item->numero-1] ->numero }}
                -
                {{ $nums [$item->numero-1] ->color  }}
              @endif
              
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
    </tfoot>  
</table>

<hr noshade="noshade" />

</div>
  
  <div class="container mt-5" style="text-align:left">
        Firma: <br>
        Aclaración:<br>
    
    <br><br>
    
  </div>

  
  </div>
  </div>
</div>
<br>
<br>
<div class="container">
  <a href=" {{ route ('imprimirRemitPDF',$id) }}" class="btn btn-primary" >
        Imprimir 1 pdf
  </a>
  <a href=" {{ route ('imprimirRemitPDF2',$id) }}" class="btn btn-info" >
    Imprimir 2 pdf
</a>
</div>

@endsection