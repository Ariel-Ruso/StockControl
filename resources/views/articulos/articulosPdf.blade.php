<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Articulos</title>
</head>
<body>

<h3 style="text-align:center">
    Tabla de Articulos
</h3>
<br>

<div class="container mt-10">
    <div class="row justify-content-center mx-auto ">
      <div class="col-md-0 mx-auto">
          <br><br>
          <table class="table table-striped" >
            <thead class="table-info font-weight-bolder font-extrabold">
              <tr>
              <th scope="col">
                    #Id
                </th>
                <th scope="col">
                    Nombre
                </th>
                <th scope="col">
                    Cantidad
                  </th>
                <th scope="col">
                    Precio de Compra
                </th>
                <th scope="col">
                    Iva
                </th>
                <th scope="col">
                    Precio de Venta
                </th>
                <th scope="col">
                    Marca
                </th>
                <th scope="col">
                    Modelo
                </th>
                <th scope="col">
                    Categoria
                </th>
                <th scope="col">
                    Proveedor                  
                </th>
              </tr>
            </thead>
            <br><br>
            <tbody>
              @foreach($arts as $item)
                <tr>
                  <th scope="row">
                    {{ $item->id }}
                  </th>     
                  <th scope="row">
                    {{ $item->nombre }}
                  </th>              
                  <td>
                    {{ $item->cantidad }}
                  </td>
                  <td>
                  $  {{ $item->precioCompra }}
                  </td>
                  <td>
                  $  {{ $item->iva }}
                  </td>
                  <td>
                  $  {{ $item->precioVenta }}
                  </td>
                  <td>
                    {{ $item->marca }}
                  </td>
                  <td>
                    {{ $item->modelo }}
                  </td>
                  <td>
                    {{ $cates[ ($item->categorias_id)-1 ]->nombre }}
                  </td>
                  <td>
                    {{ $proves[ ($item->proveedors_id)-1 ]->nombre }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>        
    </div>
</div>
    
</body>
</html>