<?php

namespace App\View\Components;

use Illuminate\View\Component;

class agrega-btn extends Component
{
    public $route;
    public $destino;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $route, $destino)
    {
        $this->route= $route;
        $this->destino= $destino;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.agrega-btn');
    }
}
