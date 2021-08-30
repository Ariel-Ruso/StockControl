<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tabla extends Component
{
    public $titulo, $col1, $col2, $col3, $items;
    
    public function __construct($titulo, $col1, $col2, $col3, $items)
    {
        $this->titulo= $titulo;
        $this->col1= $col1;
        $this->col2= $col2;
        $this->col3= $col3;
        $this->items= $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabla');
    }
}
