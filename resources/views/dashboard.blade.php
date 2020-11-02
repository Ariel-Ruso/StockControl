<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-red-1000 leading-tight text-left 
            rounded px-8 " >
            {{ __('Bienvenido:  ') }} {{Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <x-tarjeta>
                    <x-slot name="title">
                        <h1>Control de Stock </h1>
                    </x-slot>
                    <x-slot name="cuerpo">
                        Los hermanitos

                    </x-slot>

                    @liverwire('cart')
                  </x-tarjeta>

                               
            </div>
        </div>
    </div>
</x-app-layout>
