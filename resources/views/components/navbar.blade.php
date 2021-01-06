<div class="container mx-auto">
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <!-- Navbar brand -->        
           <!--  <a class="navbar-brand" href="">
                
                <img    src="/storage/images/logo.png"
                        width="200" 
                        height="150" 
                        alt="" 
                        loading="lazy" >
            </a> -->
        
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
            <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                
                </li> 
                <!-- menu usuarios -->
                <div class="dropdown">   
                    <a  href=""
                        class="btn btn-outline-primary"
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Menu Usuarios
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                            <!-- <a href="{{ route('crear_usuario') }}" class="dropdown-item">
                                Crear usuario
                            </a> -->
                            <a href="{{ route('mostrarTodos') }}" class="dropdown-item">
                                Mostrar Usuarios
                            </a>
                    </div>
                </div>
                <!-- menu articulos -->
                <div class="dropdown">   
                    <a  href=""
                        class="btn btn-outline-primary"
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Menu Articulos
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                            <a href="{{ route('crear_articulo')}}" class="dropdown-item">
                                Crear Articulo
                            </a>
                            <a href="{{ route('mostrarTodosArt')}}" class="dropdown-item">
                                Mostrar Articulos
                            </a>
                    </div>
                </div>
                     <!-- menu categorias -->
                <div class="dropdown">   
                    <a  href=""
                        class="btn btn-outline-primary"
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Menu Categorias
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                            <a href="{{ route('crear_categoria')}}" class="dropdown-item">
                                Crear Categoria
                            </a>
                            <a href="{{ route('mostrar_categorias')}}" class="dropdown-item">
                                Mostrar Categorias
                            </a>
                    </div>
                </div>
                 <!-- menu proveedores -->
                 <div class="dropdown">   
                    <a  href=""
                        class="btn btn-outline-primary"
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Menu Proveedores
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                            <a href="{{ route('crear_proveedor')}}" class="dropdown-item">
                                Crear Proveedor
                            </a>
                            <a href="{{ route('mostrar_proveedores')}}" class="dropdown-item">
                                Mostrar Proveedores
                            </a>
                    </div>
                </div>
                 <!-- menu carrito -->
                 <li class="nav-item active">
                    <a  href=" {{ route('verCarrito') }} "
                            class="btn btn-outline-primary"
                            role="button" 
                            id="dropdownbutton"    
                            aria-haspoppup="true" 
                            aria-expanded="true"
                        >
                        Ver Carrito
                    </a> 
                </li> 
                 <!-- caja -->
                 <li class="nav-item active">
                    <a  href=" {{ route('mostrarCaja') }} "
                            class="btn btn-outline-primary"
                            role="button" 
                            id="dropdownbutton"    
                            aria-haspoppup="true" 
                            aria-expanded="true"
                        >
                        Caja Diaria
                    </a> 
                </li> 
            </ul>           
        </div>
    </nav>       
</div>