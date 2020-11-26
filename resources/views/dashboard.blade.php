<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-red-1000 leading-tight text-left 
            rounded px-8 " >
            {{ __('Bienvenido    ') }} {{Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                  <x-tarjeta>
                    <x-slot name="title">
                        
                    </x-slot>
                    <x-slot name="cuerpo">
                        <div class="container col-md-8 ">
                            <div class="row justify-content-center ">
                                <div class="container mx-auto ">
                                    <img src="Storage/nuevologo.jpg" height="500" width="700" >
                                </div>
                            </div>
                        </div>
                    </x-slot>
                  </x-tarjeta>  
            </div>
        </div>
    </div>
    
        <div class="footer text-muted  px-0 py-5 mb-50">
            Creado por Traza Digital @2020
        </div>
    
</x-app-layout>
