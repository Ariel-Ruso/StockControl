@extends('layouts.app')

@section('content')

  <x-header titulo="Ordenes" />  

  <x-agrega-btn route="ordenes/create" 
  destino="Crear" />
  @if($orders->count()>0)


  <div class="container mt-4 col-md-6">
   <div class="row justify-content-center mx-auto ">
    
        <table class="table border-rounded shadow" >
          <thead class="table-warning font-normal text-center text-black-500" >
            <tr>  
                        <th scope="col">
                            Detalle
                        </th>
                        <th scope="col">
                          Fecha
                      </th>
                        <th scope="col">
                            Estado
                        </th>
                      </tr>
                      
                    </thead>
                    <tbody>
                      @foreach($orders as $item)
                      <tr class="px-6 py-3 text-center ">
                          <td>    
                              {{ $item->detalle }}
                          </td>

                          <td>
                            {{ $item->created_at->format('d/m/y')  }}<br>
                          </td>
                          <td>
                            @if ($item->estado==0)
                              {{"Sin armar"}}
                            @else
                              {{ "Armado" }}
                            @endif
                            
                          </td>                            
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            
          </div>
  </div>
  @else
    <br>
     <x-vacio mensaje="Sin Ordenes ahora" />
  @endif
  
@endsection