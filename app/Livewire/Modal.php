<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{

    public array $state = [
        'isOpen' => false,
        'component' => 'login',
        'arguments' => null,
    ];


    public function render()
    {
        return view('livewire.modal');
    }
}
