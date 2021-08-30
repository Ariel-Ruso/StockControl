<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbar extends Component
{
    //public $btn;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(  )
    {
        //$this->btn= $btn;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}
