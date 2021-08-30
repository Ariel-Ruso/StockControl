@extends('layouts.app')

@section('content')

<div class="container col-md-3 mx-auto"  name= "grafica">
            <div class="row justify-content-center ">
                    <div class="container mx-auto" >
                        <img src="/Storage/reclamos.jpeg"   height= "200" width= "300"
                        class= "img-fluid">
                    </div>
            </div>      
</div>  

@component('components.mensajes')
@endcomponent

<br>
<table class= "table">
  <tr>
    <th>

    </th>

    <th >

      @component('components.inicio-btn')
      @endcomponent
      <br><br>     

    </th>
  </tr>
</table>

<div class="container mt-10 ">
  <div class="row justify-content-center ">
      <div class="col-md-5">
          <div class="card bg-white shadow">
              <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                  <span class="text-center mx-auto font text-2xl">
                    Datos
                  </span>                       
              </div>
              <div class="card-body">     
                <div class="row justify-content-center mx-auto ">
                    <form   action="{{ route('store_r') }}" 
                            method="POST"
                            enctype= "multipart/form-data"
                            >
                            @csrf
                        @isset($item)
                          <label class=" font-weight-bolder font-extrabold text-center ">
                            Factura Afip
                          </label>
                          <input
                                type= "text"
                                name= "nFact"
                                class= "form-control mb-2 col-10 "      
                                      @isset($item->nFact)
                                        value=  {{ $item->nFact }}
                                      @else
                                        value=  {{ "--" }}
                                      @endisset
                                  />
                            <label class=" font-weight-bolder font-extrabold text-center ">
                              Num Interno
                            </label>
                              <input
                                  type= "text"
                                  name= "id"
                                  value= 
                                  {{ $item->id }} 
                                  class= "form-control mb-2 col-10 "
                              /> 
                              <label class=" font-weight-bolder font-extrabold text-center ">
                                Nombre Cliente
                              </label>
                              <input
                                  type= "text"
                                  name= "nombre"
                                  value= {{ $item->apellidoyNombre }}
                                  class= "form-control mb-2 col-10 "
                                /> 
                                
                                <label class=" font-weight-bolder font-extrabold text-center ">
                                  DNI
                                </label>

                                <input
                                  type= "text"
                                  name= "dni"
                                  value= {{ $item->dnicliente }}
                                  class= "form-control mb-2 col-10 "
                                /> 
                                
                                <label class=" font-weight-bolder font-extrabold text-center ">
                                  Artículos
                                </label>
                                @foreach($arts as $item2)
                                  
                                    <input
                                      type= "text"
                                      name= "articulos"
                                      value=  {{ $item2->descripcion }} 
                                      class= "form-control mb-2 col-10 "
                                    /> 
                                    
                                @endforeach
                                
                                <label class=" font-weight-bolder font-extrabold text-center ">
                                  Total
                                </label>
                                <input
                                    type= "text"
                                    name= "total"
                                    value= {{ $item->total }}
                                    class= "form-control mb-2 col-10 "
                                  /> 
                              @else
                        
                                  <label class=" font-weight-bolder font-extrabold text-center ">
                                    Nombre Cliente
                                  </label>
                                  <input
                                      type= "text"
                                      name= "nombre"
                                      value= "{{ old('nombre') }}"
                                      class= "form-control mb-2 col-10 "
                                    /> 
                                    
                                    <label class=" font-weight-bolder font-extrabold text-center ">
                                      DNI
                                    </label>
    
                                    <input
                                      type= "text"
                                      name= "dni"
                                      value= "{{ old('dni') }}"
                                      class= "form-control mb-2 col-10 "
                                    /> 
                                    
                                    <label class=" font-weight-bolder font-extrabold text-center ">
                                      Artículos
                                    </label>
                                    
                                        <input
                                          type= "text"
                                          name= "articulos"
                                          value=  "{{ old('articulos') }}"
                                          class= "form-control mb-2 col-10 "
                                        />                                        
                                    
                                    <label class=" font-weight-bolder font-extrabold text-center ">
                                      Total
                                    </label>
                                    <input
                                        type= "text"
                                        name= "total"
                                        value= "{{ old('total') }}"
                                        class= "form-control mb-2 col-10 "
                                      />   
                                  @endisset    

                      <div class="container text-center row justify-content-center" >
                        <button class="btn btn-success mt-3 " 
                            type="submit">
                                Crear Reclamo
                        </button>
                    </div>
                    </form>
                </div>        
              </div>
            </div>
        </div>
      </div>
  </div>        
</div>

  <!-- 
<div class="container">
  <a href=" {{ route ('articulosPdf') }}" class="btn btn-primary" >
        Imprimir pdf
    </a>
    <a href=" {{ route ('articulosPdfHoriz') }}" class="btn btn-success" >
        Imprimir pdf Horizontal
    </a>
</div> -->



  
@endsection




    


