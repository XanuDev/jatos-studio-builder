<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class BuildImport extends Component
{
    use WithFileUploads;
    public $test = false;
    public $content;




    public function render()
    {
        if($this->test)
        {
            $this->content = file_get_contents($this->test);
        }

        return view('livewire.build-import');
    }
}
