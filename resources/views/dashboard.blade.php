@extends('layouts.app')

@section('content')

@component('components.navbar')
@endcomponent

    <div class="py-8 mt-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                  <x-tarjeta>
                    <x-slot name="title">  
                         
                    </x-slot>
                    <x-slot name="cuerpo">
                        <div class="container col-md-6 ">
                            <div class="row justify-content-center ">
                                <div class="container mx-auto ">
                                    <img src="Storage/stock.png" height="700" width="600" >
                                </div>
                            </div>
                        </div>
                    </x-slot>
                  </x-tarjeta>  
            </div>
        </div>
    </div>
@endsection