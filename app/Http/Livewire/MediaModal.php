<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MediaModal extends Component
{
    public $event = false;

    public $model = false;

    public $key = false;

    protected $listeners = ['open' => 'loadModal'];

    public function loadModal()
    {
        $this->emit('toggleMediaModal');
    }

    public function delete()
    {
        $this->emitUp($this->event, $this->key);
        $this->emit('toggleMediaModal');
    }

    public function close()
    {
        $this->emit('toggleMediaModal');
    }

    public function render()
    {
        return view('livewire.media-modal');
    }
}
