<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articulo Detallado') }}
        </h2>
	</x-slot>
	
	<div class="container ">
        <a href="{{route('mostrarTodosArt')}}" 
            class="btn btn-primary float-right">
                     Volver ...
         </a>
    </div>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card bg-white shadow">
					<div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
						<span class="text-center mx-auto font text-xl">
							<h3>
								Detalles de Articulo
							<h3>
						</span>						
					</div>
					<div class="card-body">    

						Id: {{ $art->id }} <br>
						Nombre: {{ $art->nombre }} <br>
						Cantidad: {{ $art->cantidad }} <br>
						Precio: $ {{ $art->precio }} <br>
						<!-- traigo nombre de rol desde user -->
						Categoria: {{ $cates[ ($art->categorias_id)-1 ]->nombre }} <br>
						<!-- traigo nombre de provee desde user -->
						Proveedor: {{ $proves[ ($art->proveedors_id)-1 ]->nombre }} 
						<br>

					</div>
				</div>
			</div>
		</div>
	</div>	

</x-app-layout>