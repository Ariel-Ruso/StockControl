<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class abrirpaint extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'abrirPaint';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Abre paint.exe';

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
        
        $this->info('Abriendo paint...');
        system('C:\windows\system32\mspaint.exe');
        
        
        
    }
}
