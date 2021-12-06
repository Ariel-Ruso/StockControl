@extends('layouts.app')

@section('content')

<div class="float-right">
	@component('components.botones')
	@endcomponent
  </div>
	@if(count($imeis)>0)
		<x-grafica img="/Storage/celulares.jpeg" />
	@else
		<x-grafica img="/Storage/articulos.jpg" />
	@endif
	<br><br>
  <table class= "table mt-1">
	<th>
	</th>
  </table>

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card bg-white shadow">
					<div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
						<span class="text-center mx-auto font text-xl">
							<h3>
								Detalles
							<h3>
						</span>						
					</div>
					<div class="card-body">    
						<strong>
							Codigo: 
						</strong>
						{{ $art->codigo }} <br>
						<strong>
							Nombre: 
						</strong>
						{{ $art->nombre }} <br>
						<strong>
							Descripción: 
						</strong>
						{{ $art->descripcion }} <br>
						<strong>
							Cantidad:
						</strong>
						 {{ $art->cantidad }} <br>

						 @if ($cates[ ($art->categorias_id)-1 ]->nombre == "Celulares")
							
							<strong>
								Imeis Disponibles:
							</strong>
							<div class="container row justify-content-center ">
								@foreach ( $imeis as $imei) 
																	
									{{ $imei->detalle }}
									<br>

								@endforeach 
							</div>

						@endif
						@if ($cates[ ($art->categorias_id)-1 ]->nombre == "Calzados")
						
							<strong>
								Pares Disponibles:
							</strong>
							<div class="container row justify-content-center ">
								@foreach ( $numeros as $numero) 
									
									n:° {{ $numero->numero }}								
									-  {{ $numero->cantidad }} pares -
									{{ $numero->color }}
									<br>

								@endforeach 
							</div>
						@endif

						 <strong>
							Precio Compra:
						</strong>
						 $ {{ $art->precioCompra }} <br>
						 <strong>
							Venta Efectivo/ Debito:
						</strong>
						 $ {{ $art->precioVenta }} <br>
						 <strong>
							Venta Tarjeta:
						</strong>
						 $ {{ ($art->precioVenta) + ($art->precioVenta *0.18)  }} <br>
						 <strong>
							Marca: 
						</strong>
						 {{ $art->marca }} <br>
						 <strong>
							Modelo:
						</strong>
						  {{ $art->modelo }} <br>
						  
						  <strong>
						<!-- traigo nombre de rol desde user -->
							Categoria: 
						</strong>
						{{ $cates[ ($art->categorias_id)-1 ]->nombre }} <br>
						<strong>
						<!-- traigo nombre de provee desde user -->
							Proveedor:
						</strong>
						 {{ $proves[ ($art->proveedors_id)-1 ]->nombre }} <br>
						 <strong>
							Codigo Barras:
						</strong>
						{{ $art->codbar }} <br>

					</div>
				</div>
			</div>
		</div>
	</div>	
	{{-- 
	<div class="container mx-auto mt-5">
		<a href=" {{ route ('detalle_articuloPdf', $art->id) }}" 
			class="btn btn-success shadow" >
			Imprimir en pdf 
		</a>
	</div> --}}
@endsection