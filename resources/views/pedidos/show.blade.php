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
						<br>
						<strong> 
							Responsables:
						</strong>
						<button class="btn btn-outline-success btn-sm shadow" 
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
																		Responsables
																	</th>
																</tr>
																</thead>
																<tbody>
																	<tr scope= "col">
																		<th>
																			<select class="form-select " aria-label="Default select example">
																				<option selected>Conductor</option>
																				
																				@foreach($resp as $item1)
																				<option value="$item1->id">
																					{{ $item1->nombre }}
																				
																				</option>
																				@endforeach 
																				
																			</select>
																			
																			<select class="form-select " aria-label="Default select example">
																				<option selected>Cobrador</option>
																				
																				@foreach($resp as $item2)
																				<option value="$item2->id">
																					{{ $item2->nombre }}
																				
																				</option>
																				@endforeach 
																				
																			</select>


																			<input type="hidden" name="resp1" 
																				
																				value= "{{ option selected }}"
																				>
																			<input type="hidden" name="resp2" 
																				value="{{ $item2->id }}">
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