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

    public function executeAction($action, $params = [])
    {
        if (method_exists($this->arguments['action'], $action)) {
            try {
                $result = $this->arguments['action']($params);
                
                // Dispatch notification with the result message
                if (is_string($result)) {
                    $this->dispatch('notify', [
                        'type' => 'success',
                        'message' => $result
                    ]);
                } elseif (is_array($result) && isset($result['message'])) {
                    $this->dispatch('notify', [
                        'type' => $result['type'] ?? 'success',
                        'message' => $result['message']
                    ]);
                }
                
                $this->dispatch('close-modal');
            } catch (\Exception $e) {
                $this->dispatch('notify', [
                    'type' => 'error',
                    'message' => $e->getMessage()
                ]);
            }
        }
    }
    
    public function render()
    {
        return view('livewire.modal');
    }
}
