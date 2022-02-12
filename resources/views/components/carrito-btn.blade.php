<?php
    $caja= New App\Models\Caja();
    $estado= $caja->estado();
    $carrito= session()->get('carrito');
?>
    <div class="container" >
        @if ( $estado==1  && $carrito )
            <a href="{{ route('verCarrito') }}"                 
                class= "btnn btnCart 
                 float-right
                 shadow
                border-solid border-2 bg-green-200 border-black-400
                     text-xs
                    hover:font-medium hover:bg-blue-300 hover:text-black 
                    transform hover:translate-x-3 transition duration-700
                    rounded-full py-2 px-2  
                    ">
                      
                        Carrito
            </a>
        @endif
    </div>
  
