<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DeleteModal extends Component
{    
    public $event = false;
    public $model = false;
    public $key = false;

    protected $listeners = ['open' => 'loadModal'];

    public function loadModal($key, $event = false, $model = false)
    {     
        $this->key = $key;
        $this->event = $event;
        $this->model = $model;
        $this->emit('toggleDeleteModal');
    }

    public function delete()
    {        
        $this->emitUp($this->event,  $this->key );
        $this->emit('toggleDeleteModal');
    }

    public function close()
    {
        $this->emit('toggleDeleteModal');
    }

    public function render()
    {
        return view('livewire.delete-modal');
    }
}
