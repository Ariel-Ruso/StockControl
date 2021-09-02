@extends('layouts.app')

@section('content')

<div class="float-right">
	@component('components.botones')
	@endcomponent
  </div>
  <x-grafica img="/Storage/celulares.jpeg" />
  
  <br><br>
  <table class= "table mt-1">
	<th>
	</th>
  </table>

  <div class="container mt-4">
    <div class="row justify-content-center mx-auto ">
      
          <table class="table border-rounded shadow" >
            <thead class="table-warning font-normal text-center text-black-500" >
              <tr>
                <th scope="col">
                    Imei
                </th>
                <th scope="col">
                    Id de Celu
                  </th>
                
                <th scope="col-4">
                    Acciones
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($imeis as $item)
                <tr class="font text-xs text-center " width= "100%"> 
                  <td>
                    {{ $item [ ($celus->id_imeis)-1 ]->detalle }}
                  </td> 
                  <td>  
                    
                      {{ $item->nombre }}
                    
                  </td>
				  <td>
					<a   href=" {{ route('clientes.select', $item->id) }}" 
						class="btn btn-outline-primary btn-sm shadow">
						<i class= "fa fa-shopping-cart">
							Seleccionar
						</i>
					</a>
				  </td>
                  
                </tr>
              @endforeach
            </tbody>
          </table>
      
    </div>
@endsection