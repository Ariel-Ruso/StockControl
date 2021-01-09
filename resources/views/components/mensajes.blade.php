<div>
    @if (session('mensaje'))
    <div class="col-md-2 mx-auto">
            <div class="alert alert-success mt-3">
                @if (session('mensaje'))
                    {{ session( 'mensaje' ) }}        
                @endif
            </div>
        </div>
    @endif
</div>