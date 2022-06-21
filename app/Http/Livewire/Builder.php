<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\{ Build, User };
use Livewire\Component;

class Builder extends Component
{
    public $build_id = false;
    public $build_name;
    public $build_description;
    public $created = false;
    public $builded = false;
    public $building = false;

    protected $listeners = [
        'save' => 'store',
        'update' => 'update',
        'build' => 'build',
        'download' => 'download'
    ];

    public function mount($build)
    {
        if($build->id)
        {
            $this->build_id = $build->id;
            $build = Build::find($this->build_id);
        }

        $this->build_name = $build->name;
        $this->build_description = $build->description;
    }

    private function create_jas_json($file)
    {
        $component_list = [];
        $component_list[] = [
                'uuid' => Str::uuid()->toString(),
                'title' => $this->build_name,
                'htmlFilePath' => 'index.html',
                'reloadable' => true,
                'active' => true,
                'comments' => '',
                'jsonData' => null
        ];

        $component_pages = [];
        foreach ($component_list as $key => $component) {
            $component_pages[] = Str::replace(' ', '_', $component);
        }

        $jas = [
            'version' => "3",
            'data' => [
                'uuid' => Str::uuid()->toString(),
                'title' => $this->build_name,
                'description' => $this->build_description,
                'active' => true,
                'groupStudy' => false,
                'linearStudy' => false,
                'dirName' => $file,
                'comments' => "",
                'jsonData' => null,
                'endRedirectUrl' => "",
                'componentList' => $component_list,
                'batchList' => array(
                    [
                      'uuid' => Str::uuid()->toString(),
                      'title' => 'Default',
                      'active' => true,
                      'maxActiveMembers' => null,
                      'maxTotalMembers' => null,
                      'maxTotalWorkers' => null,
                      'allowedWorkerTypes' => null,
                      'comments' => null,
                      'jsonData' => null
                    ]
                )
            ],
        ];

        return json_encode($jas);
    }


    public function store()
    {
        $file = Str::replace(' ', '_', $this->build_name);

        $jas_json = $this->create_jas_json($file);

        $randomString = "";
        for ($i = 0; $i < 18; $i++) {
            $randomString .= (string)rand(0, 9);
        }

        $jas_file = $file. $randomString. '.jas';
        $zip_file = $file. '.zip';

        Storage::put('jas/'.$jas_file, $jas_json);

        $build = new Build;
        $build->name = $this->build_name;
        $build->description = $this->build_description;
        $build->jas = $jas_json;
        $build->jas_file = $jas_file;
        $build->zip_file = $zip_file;
        $build->save();

        $build->users()->attach(Auth::id());

        $this->build_id = $build->id;

        $this->emit('created');

        session()->flash('message', 'Project successfully created.');
    }


    public function update()
    {
        $file = Str::replace(' ', '_', $this->build_name);

        $jas_json = $this->create_jas_json();

        $randomString = "";
        for ($i = 0; $i < 18; $i++) {
            $randomString .= (string)rand(0, 9);
        }

        $jas_file = $file. $randomString. '.jas';
        $zip_file = $file. '.zip';

        Storage::put('jas/'.$jas_file, $jas_json);

        $build = Build::find($this->build_id);

        $build->jas = $jas_json;
        $build->jas_file = $jas_file;
        $build->zip_file = $zip_file;
        $build->save();

        $this->build->users()->attach(Auth::id());

        session()->flash('message', 'Project successfully updated.');
    }

    public function build()
    {
        $build = Build::find($this->build_id);
        $data = [
            'title' => $build->name,
            'jas' => $build->jas_file,
            'pages' => unserialize($build->component_pages),
        ];

        \App\Jobs\BuildProject::dispatch($data);

        $this->emit('builded');

        $this->building = false;

        session()->flash('message', 'Project successfully builded.');
    }

    public function download()
    {
        $build = Build::find($this->build_id);

        return Storage::download('public/'.$build->zip_file);
    }

    public function render()
    {
        return view('livewire.builder');
    }
}
