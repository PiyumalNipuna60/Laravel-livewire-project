<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $component;
    public $arguments = [];
    
    protected $listeners = ['openModal' => 'open'];
    
    public function open($component, $arguments = [])
    {
        $this->component = $component;
        $this->arguments = $arguments;
    }
    
    public function render()
    {
        return view('livewire.modal');
    }
}
