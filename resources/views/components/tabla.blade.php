{{-- @props(['items']) --}}

<div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-green-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-3xl">
                          
                          {{ $titulo }}

                        </span>             
                    </div>
                    <div class="container">
                        <table class="table">
                            <thead >
                            <tr class=" text-center text-xs leading-4 
                                font-medium text-red-500 uppercase tracking-wider">
                                    {{-- <th scope="col">
                                        Operación
                                    </th> --}}
                                    <th scope="col">
                                        
                                        {{ $col1}}
                                    </th>
                                    <th scope="col">
                                        
                                        {{ $col2 }}
                                    </th>
                                    <th scope="col">
                                        
                                        {{ $col3 }}
                                    </th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                           @if ($items)
                            @foreach ($items as $item)
                                <thead>
                                    <tr class="text-center text-xs font-medium text-black-500">
                                        <th>
                                            {{  $item->name }}
                                        </th>  
                                    
                                        <th>                                      
                                            {{ $item->email  }}<br>
                                        </th>
                                    </tr>
                                </thead>
                                @endforeach
                            @endif
                                 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
