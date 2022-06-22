<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuilderNav extends Component
{
    public $build;
    public $can_build = false;
    public $can_download = false;
    public $new_title = '';

    protected $listeners = [
        'created' => 'created',
        'builded' => 'builded',
    ];

    public function created()
    {
        $this->can_build = true;
    }

    public function builded()
    {
        $this->can_download = true;
    }

    public function new_component()
    {
        $this->emit('toggleNewComponentModal');
        $this->emit('new_component', $this->new_title);
    }

    public function render()
    {
        return view('livewire.builder-nav');
    }
}
