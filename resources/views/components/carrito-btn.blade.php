<?php
    $caja= New App\Models\Caja();
    $estado= $caja->estado();
?>
    <div class="container" >
        @if ($estado==1)
            <a href="{{ route('verCarrito') }}"                 
                class= "border-solid border-2 bg-green-200 border-black-400
                    shadow text-x1 float-right
                    hover:font-medium hover:bg-blue-300 hover:text-black 
                    transform hover:translate-x-3 transition duration-700
                    rounded-full py-2 px-2 ">
                      
                        Carrito
            </a>
        @endif
    </div>
  
