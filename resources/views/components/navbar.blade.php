<div class="container col-md-12 mx-auto " >
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light  " > -->
    <nav class="navbar navbar-expand-lg ">
        <!-- Navbar brand -->        
           <!--  <a class="navbar-brand" href="">
                
                <img    src="/storage/images/logo.png"
                        width="200" 
                        height="150" 
                        alt="" 
                        loading="lazy" >
            </a> -->
        
        <!-- Collapse button -->
        <button class="navbar-toggler " type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
        </button>
            <!-- Collapsible content -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent"  >

            <!-- Links -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                
                </li> 
                <!-- menu usuarios -->
                <div class="dropdown" >   
                    <a  href=""
                        {{ $attributes }}
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Usuarios
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                            <a href="{{ route('usuarios.index') }}" class="dropdown-item">
                                Mostrar
                            </a>
                    </div>
                </div>
                <!-- menu clientes -->
                <div class="dropdown">   
                    <a  href=""
                        {{ $attributes }}
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Clientes
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                           
                            <a href="{{ route('clientes.index')}}" class="dropdown-item">
                                Mostrar
                            </a>
                             {{-- <a href="{{ route('index')}}" class="dropdown-item">
                                Reclamos
                            </a>   --}}
                    </div>
                </div>
                <!-- menu articulos -->
                <div class="dropdown">   
                    <a  href=""
                        {{ $attributes }}
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Articulos
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                            
                            <a href="{{ route('articulos.index')}}" class="dropdown-item">
                                Mostrar
                            </a>
                            <a href="{{ route('articulosPdf')}}" class="dropdown-item">
                                Lista Difusión
                            </a>
                            <a href="{{ route('pedidos.index')}}" class="dropdown-item">
                                Mostrar Pedidos
                            </a> 
                            <a href="{{ route('presupuestos.index')}}" class="dropdown-item">
                                Mostrar Presupuestos
                            </a> 
                            <a href="{{ route('ordenes.index')}}" class="dropdown-item">
                                Orden de Compra
                            </a> 
                    </div>
                </div>
                <!-- menu categorias -->
                <div class="dropdown">   
                    <a  href=""
                        {{ $attributes }}
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Categorias
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                           
                            <a href="{{ route('categorias.index')}}" class="dropdown-item">
                                Mostrar
                            </a>
                    </div>
                </div>
                 <!-- menu proveedores -->
                 <div class="dropdown">   
                    <a  href=""
                        {{ $attributes }}
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                       Proveedores
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                           
                            <a href="{{ route('proveedores.index')}}" class="dropdown-item">
                                Mostrar
                            </a>
                    </div>
                </div>
                 <!-- menu carrito -->
                <?php
                   $caja= New App\Models\Caja();
                   
                   $res= $caja->estado();
                ?>
                {{-- @if($esta == "Cerrada") --}}
                @if($res == 0)

                    <li class="nav-item active">
                        <a  href=" {{ route('verCarrito') }} " 
                                class="btn btn-outline-primary nav-link disabled"
                                role="button" 
                                id="dropdownbutton"    
                                aria-haspoppup="true" 
                                aria-expanded="true"
                            >
                            Ver Carrito          
                            
                        </a> 
                    </li> 
                @else
                    <li class="nav-item active">
                        <a  href=" {{ route('verCarrito') }} " 
                            {{ $attributes }}
                                role="button" 
                                id="dropdownbutton"    
                                aria-haspoppup="true" 
                                aria-expanded="true"
                            >
                            Ver Carrito  
                            
                        </a> 
                    </li> 

                @endif
                
                <!-- importar --> 
            
                <li>
                {{-- <div class="dropdown">   
                    <a  href=""
                        class="btn btn-outline-primary"
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Importar
                    </a>
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                           <!--  <a href="{{ route('mostrarImportacion')}}" class="dropdown-item">
                                CAE
                            </a> -->
                            <a href="{{ route('mostrarImportacionLista')}}" class="dropdown-item">
                                Lista Precio
                            </a>
                            <a href="{{ route('migrarArticulos')}}" class="dropdown-item">
                                Migrar Articulos
                            </a>
                            <a href="{{ route('actualizarP')}}" class="dropdown-item">
                                Actualizar precios
                            </a>
                    </div>
                
                </li>  --}}
                 <!-- caja -->
                 <li class="nav-item active">
                    <a  href=" {{ route('caja.index') }} "
                        {{ $attributes }}
                            role="button" 
                            id="dropdownbutton"    
                            aria-haspoppup="true" 
                            aria-expanded="true"
                        >
                        Caja Diaria
                    </a> 
                </li>    
             
                <!-- Reportes --> 
            
                <li>
                <div class="dropdown">   
                    <a  href=""
                        {{ $attributes }}
                        role="button" 
                        id="dropdownbutton"
                        data-toggle="dropdown"
                        aria-haspoppup="true" 
                        aria-expanded="true"
                    >
                        Reportes
                    </a>    
                    <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                        <!--  <a href="{{ route('mostrarImportacion')}}" class="dropdown-item">
                             CAE
                         </a> -->
                         <a href="{{ route('ventasTotales')}}" class="dropdown-item">
                             Ventas Totales
                         </a>
                          <a href="{{ route('tenencias')}}" class="dropdown-item">
                             Tenencias
                         </a> 
                         <a href="{{ route('cantidades')}}" class="dropdown-item">
                            Cantidades
                        </a> 
                        <a href="{{ route('ventasXart')}}" class="dropdown-item">
                            Ventas x Artículo
                        </a>
                        <a href="{{ route('ventasXmes')}}" class="dropdown-item">
                            Ventas x Mes
                        </a>
                 </div>
                <!--  <li>
                      <div class="dropdown">   
                        <a  href=""
                            {{ $attributes }}
                            role="button" 
                            id="dropdownbutton"
                            data-toggle="dropdown"
                            aria-haspoppup="true" 
                            aria-expanded="true"
                        >
                            Afip
                         </a>    
                        <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                             <a href="{{ route('voucher')}}" class="dropdown-item">
                                 Voucher
                             </a> 
                             <a href="{{ route('mostrarImportacion')}}" class="dropdown-item">
                                Test2
                            </a>
                            <a href="{{ route('mostrarImportacion')}}" class="dropdown-item">
                                Test3
                            </a>
                        </div>
                     </div> 
                 </li> -->
                 <li>
                    <div class="dropdown">   
                        <a  href=""
                            {{ $attributes }}
                            role="button" 
                            id="dropdownbutton"
                            data-toggle="dropdown"
                            aria-haspoppup="true" 
                            aria-expanded="true"
                        >
                            Contable
                        </a>
                        <div  class="dropdown-menu" aria-labelledby="dropdownbutton">
                            <a href="{{ route('contable.index')}}" class="dropdown-item">
                                Facturar
                            </a> 
                        </div>
                    </div>
                 </li>  
                
            </ul>           
        </div>
    </nav>       
</div>
