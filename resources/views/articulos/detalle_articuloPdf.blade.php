<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impresion pdf</title>
	<style >
		.card-img-top{
			
			text-align: center;
		}
		.card-body {
			font-family: verdana;
			border: inset;
			text-align: center;
			border-spacing: 5px;
		}
		.card-footer{
			border: 1px solid #99999;
			text-align: center;
		}
	</style>
	
</head>
<body>
<div class="container-center">
	<div class="row-justify content-center">
		<div class="col-md-8">
			<div class="card" style="width: 25rem;" >
				<img src="Storage/HER/logodet.jpg" class="card-img-top" alt="">
				<div class="card-body">
					<h1 class="card-title">
						{{ $art->nombre }} <br>
					</h1>
					<div class="card-text">
						<!-- <h2>
							{{ $art->descripcion }} <br>
						</h2> -->
						<h3>
						 $ {{ number_format($art->precioVenta, 2) }} <br>
						 </h3>
						 <h4>
						 	6 cuotas de $
							{{  number_format(($art->precioVenta/6) ,2) }}
						</h4>
						<h4>
						 	12 cuotas de $
							{{  number_format(($art->precioVenta/12) ,2) }}
						</h4>
						<h4>
							Descuento en Efectivo 15 %
						</h4>
						<h1>
							$ {{  number_format( $art->precioVenta - ($art->precioVenta*0.15) ,2) }}
						</h1>
					</div>
  				</div>
			  	<div class="card-footer text-muted">
  					Grupo Gaona
					  <br>
  				</div>			
			</div>
		</div>
	</div>
</div>

</body>
</html>