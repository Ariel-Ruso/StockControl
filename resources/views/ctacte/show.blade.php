@extends('layouts.app')

@section('content')
	<div class="float-right">
		@component('components.botones')
		@endcomponent
		<br>
	</div>
  
	<h2>
		Estado Cta Cte
	</h2>
	<table class= "table">
		<th>

		</th>
	</table>


<div class="card-body">    
	<h3>
		<strong>
			Cliente:
		</strong>
	

		{{ $clie->nombre}} <br>
		
		<strong>
			Saldo:
		</strong>
	
		$ {{ $total}} <br>
	</h3>
	
	
</div>

@if($movim->count()>0)

	<div class="container mt-4">
		<div class="row justify-content-center mx-auto ">
			<table class="table border-rounded shadow" >
				<thead class="table font-normal text-center text-black-500 index" >
				<tr>
					<th scope="col">
						Operación
					</th> 
					
					<th scope="col">
						Debe
					</th>
					<th scope="col">
						Haber
					</th>
					<th scope="col">
					Fecha
					</th>
					{{-- <th scope="col">
						Saldo
					</th> --}}
				</thead>
				<tbody>
					@foreach($movim as $item)
						@if($item->clientes_id == $clie_id)
							<tr class="px-2 py-3 text-center text-xs">
								<td>
									<a href=" {{ route('contable.show', $item) }}">
									{{ $item->id }}
										<i class="fa fa-id-card fa-lg" 
										aria-hidden="true">
										</i>
									</a>
				
								</td>
								<td>
									@if($item->monto<0)    
										$ {{ $item->monto }}
									@endif
								</td>
								<td>
									@if($item->monto>0)    
										$ {{ $item->monto }}
									@endif                    
								</td>
								<td>
									{{ $item->created_at->format('d/m/y')  }}
								</td>
		
						</tr>
						@endif
					@endforeach
				</tbody>
			</table>
			</div>  
	</div>
@else

	<x-vacio mensaje="Sin operaciones" />
@endif

<br><br>
</div>
</div>
<br>
<br><br>

	
@endsection