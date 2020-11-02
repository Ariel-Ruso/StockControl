<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articulo Detallado') }}
        </h2>
	</x-slot>
	
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span>
							<h2>Detalles de Articulo<h2>
						</span>
						<a  href=" {{ route('mostrarTodosArt')}}" 
							class="btn btn-primary btn-sm">
							Volver ...
						</a>
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