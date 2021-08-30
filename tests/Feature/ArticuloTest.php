<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Articulo;

class ArticuloTest extends TestCase
{
    //https://www.youtube.com/watch?v=_GwqxAi_ly0&ab_channel=AlfredoMendoza
    
    public function testVerArt()
    {
        //$response = $this->get('/');
        $this->get('/articulos/mostrarTodos')
                ->assertStatus(200)
                ->assertSee ('articulos');
        
    }
/* 
    public function testVerDetalleArt(){

        $this->get('articulos/detalle_articulo/1')
            ->assertStatus(200)
            ->assertSee('Detalles ', 'Codigo', 'Nombre', 'Descripcion', 'Cantidad');

    } */

    public function testCrearArt(){

        //use RefreshDataBase;

        $response= $this->post ('articulos/crear_articulo',[
            'nombre' => 'test nombre',
            'descripcion' => 'test descripcion',
            'cantidad' => '100',
            'codigo' => '55',
            'precioCompra' => '500',
            'iva' => '50',
            'precioVenta' => '700',
            'pVentaTarj' => '850',
            'categorias_id' => '1',
            'proveedors_id' => '2'
            
        ]); 
        
        //->assertStatus(200);
        $response->assertOk();
        $this->assertCount(1, Articulo::all());

        $art= Articulo::first();

        $this->assertEquals($art->nombre, 'test nombre');
        $this->assertEquals($art->descripcion, 'test descripcion');

    }
}
