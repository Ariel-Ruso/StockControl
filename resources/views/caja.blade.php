<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Caja Diaria') }}
        </h2>
    </x-slot>
    <div class="container ">
        <a href="{{route('dashboard')}}" 
                class="btn btn-primary float-right">
                     Volver ...
         </a>
    </div>
    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-green-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Facturacion por Dia
                        </span>                       
                    </div>
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        Total  
                                    </th>
                                    <th scope="col">
                                        Fecha
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($todas as $item)
                                <thead>
                                    <th>
                                        $ {{  $item->total }}
                                    </th>
                                    <th>
                                         {{  $item->created_at->format('d M Y') }}<br>
                                    </th> 
                                </thead>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div>
    .
    </div>    
</x-app-layout>