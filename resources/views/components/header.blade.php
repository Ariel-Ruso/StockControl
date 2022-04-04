<div class="header">
    {{-- @extends('header.blade') --}}
{{-- container mt-10" --}}
    
     <div class="titulo">
        <h2>
            {{ $titulo }}
        </h2>
     </div>
       
     <div class="btn-ini">
        @component('components.botones')
        @endcomponent

    </div>
    
    <br>
</div>
