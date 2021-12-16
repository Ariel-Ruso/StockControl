@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('content')

<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
  </div>

<h2>
    Cantidades 
</h2>

<br>
<br>

<div name="tabla facturacion" class="container mt-6 ">
        <div class="row justify-content-center ">
            <div class="col-md-8">
                <div class="card bg-white shadow">
                        <table class="table">
                            <thead class="reports">
                                <tr class=" text-center text-xs leading-4 
                                    font-medium text-red-500 uppercase tracking-wider">
                                    <th scope="col-4">
                                        Nombre de Categoría
                                    </th>
                                    <th scope="col-2">
                                        Cantidad
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cantArtsxCate as $item)
                                    
                                <tr class="px-6 py-3 text-center ">
                                    <td>    
                                       {{ $cates[ ($item->categorias_id)-1 ]->nombre }}
                                    </td>
                                   
                                   
                                     <td>
                                         {{ $item->cantXcates }}
                                     </td>
                                </tr>
                                
                                @endforeach
                               
                            </tbody>
                        </table>
                </div>
            </div>
        </div>         
    </div>
</div>

<div class="container mt-5 mb-10 col-md-8" >

    <canvas id="myChart" width="400" height="200">
    </canvas>
</div>
<br><br>

<script type="text/javascript">

    var cates = @json($cates);
    
    var nombres = [];
    
        cates.map(o=>{
                    nombres.push(o.nombre)
        })
    
    var cantArtsxCate= @json ($cantArtsxCate);        

    var totales = [];
        cantArtsxCate.map(o=>{
                    totales.push(o.cantXcates)
        })
       

    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: 
                 //['Audio','Tv y video','Climtizacion'],
                nombres,
                 
            datasets: [{
                label: 'Cantidades',
                fontSize: 30, 
                fontColor: '#12619c',
//                bordercColor: "red",
                //data: ['503640.28', '832840.04','812490.46'],
                data: totales,

                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)' 
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)' 
                ],
                borderWidth: 2
            }]
        },
        options:{
            //responsive: true,
            
            title: {
                display: true,
                text: 'Tenencias hasta Hoy ',
                fontSize: 30, 
                fontColor: '#12619c',
            },
            legend:{
                position: 'bottom',
                labels: {
                    padding: 20,
                    boxWidht: 35,
                }
            },
        }
    });
</script>

@endsection

