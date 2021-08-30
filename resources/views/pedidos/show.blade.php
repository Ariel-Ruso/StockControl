@extends('layouts.app')

@section('content')

@component('components.inicio-btn')
@endcomponent

<br><br>
@component('components.volver-btn')
@endcomponent

@component('components.mensajes')
@endcomponent
     

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card bg-white shadow">
					<div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
						<span class="text-center mx-auto font text-xl">
							<h3>
								Detalles del Pedido
							<h3>
						</span>						
					</div>
					<div class="card-body">    
						<strong>
							Operación:
						</strong>
						{{ $pedis->id }} <br>
						<strong>
							Fecha: 
						</strong>
						 {{ $pedis->created_at->format('d/m/y') }} <br>
						{{-- <strong>
							Subtotal: 
						</strong>
						$ {{ $pedis->subtotal }} <br>
						<strong>
							Iva:
						</strong>
						$ {{ $pedis->iva }} <br>
						--}}
						 
						 <strong>
							Cliente:
						</strong>
						  {{ $clie [($pedis->clientes_id) - 1]->nombre }} <br>
						{{--  <strong>
							Dni:
						</strong>
						  {{ $pedis->dnicliente }} <br> --}}
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
							Total:
						</strong>
						 $ {{ $pedis->total }} <br>
						 <strong> 
							Estado:
						</strong>
						@if($pedis->estado == 0)
							{{  'Sin Entregar' }}
						@else
							{{ 'Entregado'}}
						@endif
							
					</div>
				</div>
			</div>
		</div>
	</div>
<br><br>

	<div class="container mx-auto" >
		<div class="col-md-12">
			<div class="row justify-content-center">
					
		{{-- @if( $fact->numfact > 0 )
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
					class="btn btn-success mr-1" >
						Ver 
				</a>
			@else
				<a href=" {{ route ('imprimirFactA', $fact->id) }}" 
					class="btn btn-success mr-1" >
						Ver 
				</a>
			@endif
			

		@else
			<a 	href= " {{ route ('generarFacturaA', $fact->id) }}" 
				class="btn btn-primary  mr-1" >
					Facturar A
			</a>
			<a href=" {{ route ('generarFacturaB', $fact->id) }}" 
				class="btn btn-primary mr-1" >
					Facturar B
			</a>
		@endif --}}
	
	{{-- <a 	href=" " 
		class="btn btn-danger mr-1" >
			Anular
	</a>
	<a 	href=" " 
		class="btn btn-info mr-1" >
			Nota Crédito
	</a>
	<a href=" {{ route ('imprimirRemit', $fact->id) }}" 
		class="btn btn-warning" >
			Remito
	</a> --}}
	</div>
</div>
</div>
<br>
<br><br>

	
@endsection