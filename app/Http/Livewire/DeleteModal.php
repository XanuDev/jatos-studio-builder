<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteModal extends Component
{    
    public $model_name = 'aa';
    public $key = false;

    protected $listeners = ['open' => 'loadModal'];

    public function loadModal($key, $event)
    {     
        $this->key = $key;
        $this->event = $event;
        $this->emit('toggleDeleteModal');
    }

    public function delete()
    {
        $this->emitUp($this->event,  $this->key );
        $this->emit('toggleDeleteModal');
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
