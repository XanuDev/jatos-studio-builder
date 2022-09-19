<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormBuilder extends Component
{
    public $identifier;
    public $component;
    public $components;
    public $input_key;
    public $count = 0;

    public function dehydrate()
    {
        $this->count++;
    }

    public function render()
    {
        return view('livewire.form-builder');
    }
}
