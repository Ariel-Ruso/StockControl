<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class instalarStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instalar:stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instala composer y migra mysql';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->line('Instalacion del software');
        $this->line(' ');
        //composer require laravel/stock

        $this->call('config:cache');
 
        $this->info("Configurando la Base...");
        $dbName = $this->ask('Ingrese Nombre');
        $dbUser = $this->ask('Ingrese Usuario', 'root');
        $dbPassword = $this->ask('Sin password', false);
        if($dbPassword == false) {
            $dbPassword = '';
        }
        // http://laravel-tricks.com/tricks/change-the-env-dynamically
        $env_update = $this->changeEnv([
            'DB_DATABASE'   => $dbName,
            'DB_USERNAME'   => $dbUser,
            'DB_PASSWORD'   => $dbPassword
        ]);

        if ( $env_update ) {    
            $this->call('migrate');
            $this->call('db:seed');
            $this->line('Tablas listas!');
            $this->line(' ');
 
            $this->info('Publicando paquetes...');
            $this->call('vendor:publish');
            $this->line(' ');
 
            /* $this->info('Installing npm packages and compiling assets...');
            system('npm install');
            $this->line('npm packages installed!');
            system('npm run dev');
            $this->line('Assests compiled as development environment! If you have in production you will have to run npm run prod!');
            $this->line(' '); */
        
            $this->line('Stock Control instalado correctamente!');
            } else {
                $this->line('Error!');
            }
    }

        // http://laravel-tricks.com/tricks/change-the-env-dynamically
    protected function changeEnv($data = array()){
        if(count($data) > 0){
 
            $filenameEnv = (file_exists(base_path(".env"))) ? '.env' : '.env.example';
 
            // Read .env-file
            $env = file_get_contents(base_path() . '/'.$filenameEnv);
 
            // Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;
 
            // Loop through given data
            foreach((array)$data as $key => $value){
 
                // Loop through .env-data
                foreach($env as $env_key => $env_value){
 
                    // Turn the value into an array and stop after the first split
                    // So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);
 
                    // Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
                        // If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
                        // If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }
 
            // Turn the array back to an String
            $env = implode("\n", $env);
 
            // And overwrite the .env with the new data
            file_put_contents(base_path() . '/'.$filenameEnv, $env);
            
            return true;
        } else {
            return false;
        }
    }
    
}
