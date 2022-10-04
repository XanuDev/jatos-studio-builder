<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BuildImport extends Component
{
    public $file_content = false;

    public $content = '';

    public function clear()
    {
        $this->file_content = false;
        $this->content = '';
    }

    public function import()
    {
        json_decode($this->content);
        if (json_last_error() != JSON_ERROR_NONE) {
            session()->flash('error', 'Incorrect format');

            return false;
        }

        return true;
    }

    public function load_file()
    {
        if ($this->file_content) {
            json_decode($this->file_content);

            if (json_last_error() == JSON_ERROR_NONE) {
                $this->content = $this->file_content;
            } else {
                $this->content = '';
                session()->flash('error', 'Incorrect format');
            }
        }
    }

    public function render()
    {
        return view('livewire.build-import');
    }
}
