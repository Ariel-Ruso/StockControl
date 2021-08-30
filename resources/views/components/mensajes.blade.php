<div>
    @if (session('mensaje'))
    <div class="col-md-3 mx-auto">
            <div class="alert alert-success mt-2 text-center">
                @if (session('mensaje'))
                    {{ session( 'mensaje' ) }}        
                @endif
            </div>
        </div>
    @endif
</div>