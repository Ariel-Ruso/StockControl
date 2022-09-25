@extends('layouts.app')

@section('content')
	
	<x-header titulo="Estado" />  

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

		<button type="button" 
			class=	"btnn btnAdd shadow
					float-right
					py-2 px-2 " 
			data-toggle="modal" 
			data-target="#ingresarDinero">
	
				Ingresa Dinero
		</button>      
		
	</div>

	             
                  

	@if($movim->count()>0)

		<div class="container mt-5">
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

		<div  class="modal fade" 
                              id="ingresarDinero"
                              tabindex="-1" 
                              role="dialog" 
                              aria-labelledby="exampleModalLongTitle" 
                              aria-hidden="true">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                     
                                      <div class="modal-body">
                                        <h5>
                                            <div class="container row justify-content-center ">  
                                              <div class="container mt-4">
                                                <div class="row justify-content-center mx-auto ">
                                                      <table class="table border-rounded shadow" >
                                                        <thead class="table-warning font-normal text-center text-black-500" >
                                                          <tr>
                                                            <th scope="col">
                                                                Monto
                                                            </th>
                                                                  
                                                          </tr>
                                                        </thead>
                                                        <tbody>
                                                          {{-- @foreach($imeis as $imei) --}}
                                                            <tr class="font text-xs text-center " width= "100%"> 
                                                              {{-- @if ($item->id == $imei->articulos_id) --}}

                                                                <form  action= "{{ route('ctacte.store')}}" 
                                                                        method="post">
                                                                        @method ('post')
                                                                          @csrf
                                                                  <td>
                                                                    <input type="number" name="monto" 
                                                                    {{-- value="{{ $item->id }}" --}}
																	>
                                                                    
                                                                    <input type="hidden" name="cliente_id"
                                                                    	value="{{ $clie_id }}"
																	>

                                                                    {{-- {{ $imei->detalle }} --}}
                                                                  </td> 
                                                                  <td>
																	<button type="submit" 
																	class="btn btn-primary " 
																								   >
																								   Cargar
																						   </button>
                                                                
                                                                  </td>
                                                                </form>

                                                                {{-- @endif   --}}
                                                            </tr>
                                                          {{-- @endforeach --}}
                                                        </tbody>
                                                      </table>
                                                  
                                                  </div>
                                              </div>
                                            </div>
                                                                
                                        </h5>
                                     {{--    <div class="modal-footer">

                                          <a class="btn btn-danger" 
                                              data-dismiss="modal">
                                                Cancelar
                                          </a>
										  
                                        
                                        </div> --}}
                                    </div>
                                </div>
        </div>

		<br><br>
	</div>
	</div>
	<br>
	<br>

	
@endsection