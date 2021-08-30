<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class autoriza extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'autoriza';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Se conecta any2fe y genera prox factura';

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
        $this->info('Abriendo any2fe...');
        system('C:\Users\USURIO\Downloads\any2fe\autoriza.bat');
    }
}
