@extends('layouts.app')

@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
</div>
    <h2>
        Pedidos
    </h2>
<br><br>

@if($items->count())

	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<div class="card 
				{{-- bg-white  --}}
				shadow">
					<div class=" py-3 px-8 
					{{-- bg-blue-200 d-flex justify-content-between align-items-center  --}}
					cart2">
						{{-- <span class="text-center mx-auto font text-xl"> --}}
							<h3>
								Detalles
							<h3>
						{{-- </span>						 --}}
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
						<br>
						<strong> 
							Responsables:
						</strong>
						@if($pedis->responsables != NULL )
							{{ $pedis->responsables }}
						@else

							<button class="btn btn-success btn-sm shadow" 
									type="button"
									data-toggle="modal" 
									data-target="#respon{{$item->id}}" >                                 
										Elegir     
							</button>
							<div  class="modal fade" 
                                id="respon{{$item->id}}" 
                                tabindex="-1" 
                                role="dialog" 
                                aria-labelledby="exampleModalLongTitle" 
                                aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                 
                                              </div>
                                              <div class="modal-body">
											  <form action= "{{ route('pedidos.asignar', $item->id) }}" 
                                                        method="post" 
                                                        class="d-inline" >
                                                          @method ('PosT')
                                                          @csrf
												<h5>
												  <div class="container row justify-content-center ">  
													<div class="container mt-4">
														<div class="row justify-content-center mx-auto ">
															<table class="table border-rounded shadow" >
																<thead class="table-info font-normal text-center text-black-400" >
																<tr>
																	<th>
																		Responsables del envío
																	</th>
																</tr>
																</thead>
																<tbody>
																	<tr scope= "col">
																		<th>

																			<label for="" name="conduc">
																				<input type="radio" name="conduc" id="" value=" Alexis" checked>Alexis
																				<br>
																				<input type="radio" name="conduc" id="" value=" Jose Luis">Jose Luis
																			</label>

																		</th>
																		
																	</tr>
																	<tr scope= "col">
																		<th>
																		<label for="" name="cobr">
																				<input type="radio" name="cobr" id="" value=" Facundo" checked>Facundo
																				<br>
																				<input type="radio" name="cobr" id="" value=" Gaston">Gaston
																			</label>
																		</th>

																		</tr>
																</tbody>
                                                    		</table>
                                                		</div>
                                            		</div>
                                          		</div>
                                      			</h5>
                                              <div class="modal-footer">
                                                 
                                                          <button type="submit" 
                                                                  class="btn btn-primary " 
                                                                  >
                                                                    Grabar
                                                          </button>
                                                  </form>
                                                  <a class="btn btn-danger" data-dismiss="modal">
                                                    No
                                                  </a>
                                              </div>
                                        </div>
                              		</div>
							</div>
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

@else

	<x-vacio mensaje="Sin Items ahora" />    

@endif

	
@endsection