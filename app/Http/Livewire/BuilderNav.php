<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuilderNav extends Component
{
    public $build;
    public $nav_title = '';
    public $can_build = false;
    public $can_download = false;
    public $new_title = '';
    public $is_update = false;
    public $is_private = false;

    protected $listeners = [
        'created' => 'created',
        'builded' => 'builded',
    ];

    public function mount($build)
    {
        $this->nav_title = $build->title;
        if ($build->id) {
            $this->is_update = true;
            $this->can_build = true;
            $this->can_download = true;
        }
    }

    public function created()
    {
        $this->can_build = true;
    }

    public function builded()
    {
        $this->can_download = true;
    }

    public function addComponent()
    {
        $this->emit('toggleAddComponentModal');
        $this->emit('add_component', $this->new_title);
        $this->new_title = '';
    }

    public function addInput($name)
    {
        $this->emit('add_input', $name);
    }

    public function render()
    {
        return view('livewire.builder-nav');
    }
}
