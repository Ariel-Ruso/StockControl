@extends('layouts.app')

@section('content')
<style >
  .container {
    /* width: 90%;
    height: 90%; */
  }
</style>

<div class="float-right">
  @component('components.botones')
  @endcomponent
</div>

<x-grafica img="/Storage/remitos.png" />
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
                    
                      <img src="/Storage/letraX.jpg" alt="" width="80" >
                     
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
        @php
        $subtotal=0;  
        @endphp
        
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
          @php

            $subtotal= $subtotal + ($item->precioUnit *  $item->cantidad);
          @endphp
          
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
              Descuento:
          </strong>
        </td>
        <td style="text-align:center" class="gray"> 
            {{-- {{ $subtotal}} --}}
            {{-- {{ $total - ($item->precioUnit *  $item->cantidad)  }} --}}
            {{ $total - $subtotal }}
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