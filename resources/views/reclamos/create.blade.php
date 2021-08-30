@extends('layouts.app')

@section('content')

<x-grafica img="/Storage/reclamos.jpeg" />

@component('components.mensajes')
@endcomponent
{{-- 
    <div class="container mt-10 ">
        <div class="row justify-content-center ">
            <div class="col-md-5">
                <div class="card bg-white shadow">
                    <div class=" py-3 px-8 bg-blue-200 d-flex justify-content-between align-items-center">
                        <span class="text-center mx-auto font text-2xl">
                          Agregar Reclamo
                        </span>                       
                    </div>
                    <div class="card-body">     
                     
                      <form   action="{{ route('buscar') }}" 
                              method="POST"
                              enctype= "multipart/form-data"
                              >
                        @csrf
                            <div class="container  mx-auto" name= "errores">
                                                                
                                @error('dni')
                                <div class="alert alert-success row justify-content-center">
                                    Ingrese Dni 
                                </div>
                                @enderror
                                
                            </div>
                            <div class="container " name="etiquetas">
                                <div class="row justify-content-center ">
                                    <div class="col-md-8 ">
                                        <input
                                            type= "text"
                                            name= "dni"
                                            placeholder= "DNI Cliente"
                                            class= "form-control mb-2  "
                                        /> 
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="container text-center row justify-content-center" >
                                <button class="btn btn-success mt-3 " 
                                    type="submit">
                                        Buscar
                                </button>
                            </div>
                      </form>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <table class= "table">
        <tr>
          <th>
            <div class="container mt-3 mx-auto" name="busqueda" >
              <nav class="d-flex navbar navbar-light float-center tablet: d-flex flex-col">
                <form  class="form-inline col-auto " action="{{ route('buscaCliente') }}" >
                    {{-- <input    name="nombre" 
                              id= "nombre"
                              class="form-control mr-sm-2" 
                              type="search" 
                              placeholder="Nombre" 
                              aria-label="Search"
                              > --}}
                    <input    name="dni" 
                              id= "dni"
                              class="form-control mr-sm-2 " 
                              type="search" 
                              placeholder="Dni" 
                              aria-label="Search"
                              >
                  
                    <button class="btn btn-outline-success sm" 
                          type="submit" 
                          >
                                Buscar
                    </button>
                  </form>
              </nav><br><br>
            </div>
          </th>
          <th style= "mr-10" >
              @component('components.inicio-btn')
              @endcomponent
              <br>
              
          
          
            <div class="container mt-3" name="Add">
                <a href="{{ route('cargar') }}" 
                        {{-- class="btn btn-outline-success btn-sm float-right"> --}}
                        class="btn btn-outline-success btn-sm float-right">
                        <i class= "fa fa-plus">
                          Cargar 
                        </i>
                </a>
              </div>
          </th>
        </tr>
      </table>

    <div class="container mt-4">
        <div class="container">
            <table class="table">
                <thead >
                <tr class=" text-center text-xs leading-4 
                    font-medium text-red-500 uppercase tracking-wider">
                        {{-- <th scope="col">
                            Operación
                        </th> --}}
                        <th scope="col">
                            N Fact
                        </th>
                        <th scope="col">
                            Fecha
                        </th>
                        
                        <th scope="col">
                            Vendedor
                        </th>
                        <th scope="col">
                            Cliente
                        </th>
                        <th scope="col">
                            Efectivo  
                        </th>
                        <th scope="col">
                            Tarjetas
                        </th>
                        <th scope="col">
                            Remito
                        </th> 
                        <th scope="col">
                            Factura
                        </th> 
                        <th scope="col">
                            Seleccionar
                        </th> 
                    </tr>
                </thead>
                <tbody>
                @foreach ($facts as $item)
                    <thead>
                    <tr class="text-center text-xs font-medium text-black-500">
                        <th>
                            @if( $item->numfact > 0 )
                                {{  $item->numfact }}                                        
                            @else
                                 {{ ' No Generada '}} 
                            @endif 
                        </th> 
                        <th>                                      
                             {{ $item->created_at->format('d/m/y')  }}<br>
                        </th>
                        <th>
                             {{  $users[ ($item->users_id)-1]->name }}
                        </th>
                        <th>
                             {{  $item->apellidoyNombre }}
                        </th>
                        <th>
                            @if($item->tipoPago==1)
                                $ {{  $item->total }}
                                @else
                                $ {{'-' }}
                            @endif
                        </th>
                        <th>
                            @if($item->tipoPago!=1)
                                $ {{  $item->total }}
                                @else
                                $ {{ '-' }}
                            @endif
                        </th>
                     
                        <th>
                            <a href=" {{ route ('imprimirRemit', $item->id) }}" 
                                class="btn btn-outline-warning" >
                                    Ver
                            </a>
                        </th> 

                        <th>
                           {{--  @if( $item->numfact > 0 )
                                <a href=" {{ route ('imprimirFact', $item->id) }}" 
                                    class="btn btn-outline-primary " >
                                        Ver 
                                </a>
                            @else
                                <a href=" {{ route ('imprimirFact', $item->id) }}" 
                                    class="btn btn-outline-primary disabled " >
                                        Ver 
                                </a>
                            @endif --}}

                        </th> 
                        <th>
                            <a   href=" {{ url('elegir_factura/'.$item->id) }}" 
                                class="btn btn-outline-primary btn-sm">
                                <i class= "fa fa-shopping-cart">
                                    Seleccionar
                                </i>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    @endforeach
                </tbody>
            </table>
        </div>
            
      </div>

@endsection