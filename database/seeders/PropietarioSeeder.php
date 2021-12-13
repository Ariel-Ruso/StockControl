<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Propietario;

class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prop= new Propietario();
        $prop->lema= "MUEBLERIA Y ARTICULOS DEL HOGAR";
        $prop->nombre= "De: Obregón Walter Eduardo";
        $prop->localidad= "(1759) G Catán- Pcia de Buenos Aires";
        $prop->direccion= "Jose Maria Moreno 633";
        $prop->telefono= "022202-421334";
        $prop->iva= "IVA RESPONSABLE INSCRIPTO";
        $prop->cuit= "20-20891882-7";
        $prop->ingbru= "20-20891882-7";
        $prop->jubilacion= "20891882";
        $prop->partmuni= "133700";
        $prop->iniactiv= "12/12/91";

        $prop->save();

        
        $prop= new Propietario();
        $prop->lema= "DISTRIBUIDORA GASTRONOMICA";
        $prop->nombre= "De: DANIEL MAIONE";
        $prop->localidad= "(1757) GREGORIO DE LAFERRERE";
        $prop->direccion= "OLEGARIO ANDRADE 5649";
        $prop->telefono= "116212-4024";
        $prop->iva= "IVA RESPONSABLE INSCRIPTO";
        $prop->cuit= "20-17994054-0";
        $prop->ingbru= "20-17994054-0";
        $prop->jubilacion= "20891882";
        $prop->partmuni= "";
        $prop->iniactiv= "01/09/12";

        $prop->save();
               
            
        $prop= new Propietario();
        $prop->lema= "GEMINIS ZAPATERIA";
        $prop->nombre= "De: Pablo Padua";
        $prop->localidad= "(1759) Gonzalez catan";
        $prop->direccion= "Dr equiza 4215";
        $prop->telefono= "";
        $prop->iva= "";
        $prop->cuit= "20-17547587-8";
        $prop->ingbru= "";
        $prop->jubilacion= "";
        $prop->partmuni= "";
        $prop->iniactiv= "";

        $prop->save();
        

    }
}
