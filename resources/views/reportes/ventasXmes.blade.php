@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@section('content')
  
<div class="float-right">
    @component('components.botones')
    @endcomponent
    <br>
  </div>
{{-- <x-grafica img="/Storage/reportes.jpg" /> --}}
<h2>
    Ventas
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
                                        Fecha
                                    </th>
                                    <th scope="col-2">
                                        Ventas
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ventXmes as $item)
                                    
                                <tr class="px-6 py-3 text-center ">
                                    <td>    
                                       {{ $item->created_at }}                             
                                    </td>
                                  {{--  <td>
                                        @foreach($arts as $item2)
 
                                              @if($item->codigo == $item2->codigo)                   
                                                 {{  $item2->nombre }}  
                                             @endif                 
  
                                         @endforeach     
                                     </td>
                                   --}}
                                     <td>
                                         $ {{ $item->totales }}
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


{{-- 
<script type="text/javascript">

    var arts = @json($arts);
    
    var nombres = [];
    
        cates.map(o=>{
                    nombres.push(o.nombre)
        })
    
    var ventXcate= @json ($ventXcate);        

    var ventas = [];

        ventXcate.map(o=>{
                    ventas.push(o.totales)
        })

        //console.log(nombres)

    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: 
                nombres,
            datasets: [{
                label: 'Ventas x Artículos',
                fontSize: 80, 
                //fontColor: '#12619c',
                
                data: ventas,

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
                fontSize: 50, 
                fontColor: '#12619c',
            },
            legend:{
                position: 'bottom',
                labels: {
                    //padding: 20,
                    //boxWidht: 5,
                },
            },
        }
    });
</script>
 --}}
@endsection

