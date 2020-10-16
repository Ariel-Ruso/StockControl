<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories;
use App\Models\User;

class probarArtTest_ extends TestCase
{
    
    public function testCrearArt()
    {
        //1.given - user auth
       
        //->assertSee('pepe');
        
       
        //2.when - cdo clik en crear art

        
        //3.then entonces veo vista crear
        
    }

    public function testEliminarArt()
    {
        //1.given - user auth
        $this->get('/articulos/crear_articulo2')
        ->assertStatus(200);
    }

}
