<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Cart extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.cart', [
            'users' => User::where('username', $this->search)->get(),
        ]);
    }
}
