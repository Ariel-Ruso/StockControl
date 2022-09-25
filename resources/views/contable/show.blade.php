@extends('layouts.app')

@section('content')

	<x-header titulo="Contable" />  


	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card bg-white shadow">
					<div class=" cart2 py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
						<span class="text-center mx-auto font text-xl">
							<h3>
								Detalles de Operación
							<h3>
						</span>						
					</div>
					<div class="card-body">    
						<strong>
							Operación:
						</strong>
						{{ $fact->id }} <br>
						<strong>
							Fecha: 
						</strong>
						 {{ $fact->created_at->format('d/m/y') }} <br>
						<strong>
							Subtotal: 
						</strong>
						$ {{ $fact->subtotal }} <br>
						<strong>
							Iva:
						</strong>
						$ {{ $fact->iva }} <br>
						 <strong>
							Total:
						</strong>
						 $ {{ $fact->total }} <br>
						 <strong>
							Cliente
						</strong>
						  {{ $fact->apellidoyNombre }} <br>
						 <strong>
							Dni:
						</strong>
						  {{ $fact->dnicliente }} <br>
						 <strong>
							Artículos: 
						</strong>
						@foreach($items as $item)
							<td style="text-align:center">
								{{ $item->cantidad }}
							</td>
							
							<td style="text-align:center">
								{{ $item->descripcion }}
							</td>
						@endforeach
						<br>

						 <strong>
							Factura A:
						</strong>
							@if($fact->tipoCte== 'A')
								{{ $fact->numfact }} 
							@else
								{{ "-" }}
							@endif
						<br>
						<strong>
							Factura B:
						</strong>
						@if($fact->tipoCte== 'B')
							{{ $fact->numfact }} 
						@else
							{{ "-" }}
						@endif
						<br>
						
						<strong>
							Remito:
						</strong>
						{{ '0002-00023'.$fact->id }}
					</div>
				</div>
			</div>
		</div>
	</div>
<br><br>

	<div class="container mx-auto" >
		<div class="col-md-12">
			<div class="row justify-content-center">
			{{-- 		
		@if( $fact->numfact > 0 )
			<a 	href= " {{ route ('generarFacturaA', $fact->id) }}" 
				class="btn btn-outline-primary disabled mr-1" >
					Facturar A
			</a>
			<a 	href=" {{ route ('generarFacturaB', $fact->id) }}" 
				class="btn btn-outline-primary disabled mr-1" >
					Facturar B
			</a>
			@if($fact->tipoCte== 'B')
				<a href=" {{ route ('imprimirFactB', $fact->id) }}" 
					class="btn btn-success mr-1 shadow" >
						Ver 
				</a>
			@else
				<a href=" {{ route ('imprimirFactA', $fact->id) }}" 
					class="btn btn-success mr-1 shadow" >
						Ver 
				</a>
			@endif
			

		@else
			<a 	href= " {{ route ('generarFacturaA', $fact->id) }}" 
				class="btn btn-primary  mr-1 shadow" >
					Facturar A
			</a>
			<a href=" {{ route ('generarFacturaB', $fact->id) }}" 
				class="btn btn-primary mr-1 shadow" >
					Facturar B
			</a>
		@endif
	
	<a 	href=" " 
		class="btn btn-danger mr-1 shadow" >
			Anular
	</a>
	<a 	href=" " 
		class="btn btn-info mr-1 shadow" >
			Nota Crédito
	</a>
	 
	 --}}
	<a href=" {{ route ('imprimirRemit', $fact->id) }}" 
		class="btn btn-warning shadow" >
			Remito
	</a>
	</div>
</div>
</div>
<br>
<br><br>

	
@endsection