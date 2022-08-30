<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\{Build, User, JatosComponent};
use Livewire\WithFileUploads;
use Livewire\Component;

class Builder extends Component
{
    use WithFileUploads;

    public $build_id = false;
    public $build_title;
    public $build_description;
    public $created = false;
    public $builded = false;
    public $building = false;
    public $components = [];
    public $active_component = false;
    public $images = [];
    public $preload = false;

    protected $listeners = [
        'save' => 'store',
        'update' => 'update',
        'build' => 'build',
        'download' => 'download',
        'add_component' => 'addComponent',
        'add_input' => 'addInput',
    ];

    public function mount($build, $json = false)
    {
        if ($json) {
            $this->components = json_decode($json, true);
            $this->preload = true;
        }

        if ($build->id) {
            $this->build_id = $build->id;
            $build = Build::find($this->build_id);
            $this->preload = true;
            foreach ($build->jatos_components as $key => $component) {
                $this->addComponent($component->title);
                $inputs = json_decode($component->json, true);
                $this->components[$this->active_component]['inputs'] = $inputs;
            }
        }

        $this->build_title = $build->title;
        $this->build_description = $build->description;
    }

    public function hydrate()
    {
        $this->preload = false;
    }

    private function setComponentActive($title)
    {
        foreach ($this->components as $key => $component) {
            $active = false;
            if ($component['title'] == $title) {
                $active = true;
                $this->active_component = $key;
            }
            $this->components[$key]['active'] = $active;
        }
    }

    public function setActive($key)
    {
        $this->setComponentActive($this->components[$key]['title']);
    }

    public function addComponent($title)
    {
        $this->components[] = [
            'title' => $title,
            'active' => false,
            'inputs' => [],
        ];
        $this->setComponentActive($title);
        $this->addInput('home');
    }

    public function addInput($type)
    {
        if (sizeof($this->components) < 1) {
            session()->flash('warning', 'No component selected');
            return;
        }

        $count = sizeof($this->components[$this->active_component]['inputs']);
        $input = \App\Constants\Component::LIST[$type];

        $this->components[$this->active_component]['inputs'][] = [
            'id' => $count,
            'type' => $type,
            'name' => $input['name'],
            'title' => '',
            'content_type' => $input['content_type'],
            'contents' => '',
            'component' => $input['component'],
        ];
    }

    private function createJasJson($file)
    {
        $component_list = [];
        foreach ($this->components as $key => $component) {
            $component_title = Str::replace(' ', '_', $component['title']);
            $component_list[] = [
                'uuid' => Str::uuid()->toString(),
                'title' => $component_title,
                'htmlFilePath' => $component_title . '.html',
                'reloadable' => true,
                'active' => true,
                'comments' => '',
                'jsonData' => null,
            ];
        }

        $jas = [
            'version' => '3',
            'data' => [
                'uuid' => Str::uuid()->toString(),
                'title' => $this->build_title,
                'description' => $this->build_description,
                'active' => true,
                'groupStudy' => false,
                'linearStudy' => false,
                'dirName' => $file,
                'comments' => '',
                'jsonData' => null,
                'endRedirectUrl' => '',
                'componentList' => $component_list,
                'batchList' => [
                    [
                        'uuid' => Str::uuid()->toString(),
                        'title' => 'Default',
                        'active' => true,
                        'maxActiveMembers' => null,
                        'maxTotalMembers' => null,
                        'maxTotalWorkers' => null,
                        'allowedWorkerTypes' => null,
                        'comments' => null,
                        'jsonData' => null,
                    ],
                ],
            ],
        ];

        return json_encode($jas);
    }

    public function clear_image($key, $active)
    {
        $this->components[$active]['inputs'][$key]['contents'] = '';
    }

    public function store($is_private)
    {
        //Check if all image inputs has files
        foreach ($this->components as $c_key => $component) {
            foreach ($component['inputs'] as $i_key => $input) {
                if ($input['content_type'] == 'img') {

                    if (!is_object($input['contents'])) {
                        session()->flash('warning', 'There are image type inputs without file');
                        return;
                    }
                }
            }
        }

        $file = Str::replace(' ', '_', $this->build_title);

        $jas_json = $this->createJasJson($file);

        $randomString = '';
        for ($i = 0; $i < 18; $i++) {
            $randomString .= (string) rand(0, 9);
        }

        $file_name = $file . $randomString;
        $jas_file = $file_name . '.jas';
        $json_file = $file_name . '.json';
        $zip_file = $file . '.zip';

        Storage::put('jas/' . $jas_file, $jas_json);

        $build = new Build();
        $build->title = $this->build_title;
        $build->description = $this->build_description;
        $build->jas = $jas_json;
        $build->jas_json_file_name = $file_name;
        $build->is_private = $is_private ? true : false;
        $build->zip_file = $zip_file;
        $build->user_id = Auth::id();
        $build->save();

        $this->build_id = $build->id;

        foreach ($this->components as $c_key => $component) {

            foreach ($component['inputs'] as $i_key => $input) {
                if ($input['content_type'] == 'img') {
                    $this->images[] = $this->components[$c_key]['inputs'][$i_key]['contents'] = $input['contents']->store('img', 'public');
                }
            }

            $components_json = json_encode($this->components[$c_key]['inputs']);

            $jatos_component = new JatosComponent();
            $jatos_component->title = $component['title'];
            $jatos_component->json = $components_json;
            $jatos_component->save();
            $build->jatos_components()->attach($jatos_component->id);
        }

        $json_inputs = json_encode($this->components);

        Storage::put('json/' . $json_file, $json_inputs);

        $this->emit('created');

        session()->flash('message', 'Project successfully created.');
    }

    public function update()
    {
        $file = Str::replace(' ', '_', $this->build_title);

        $jas_json = $this->createJasJson($file);

        $randomString = '';
        for ($i = 0; $i < 18; $i++) {
            $randomString .= (string) rand(0, 9);
        }

        $file_name = $file . $randomString;
        $jas_file = $file_name . '.jas';
        $json_file = $file_name . '.json';
        $zip_file = $file . '.zip';

        Storage::put('jas/' . $jas_file, $jas_json);

        $build = Build::find($this->build_id);

        $build->jas = $jas_json;
        $build->jas_json_file_name = $file_name;
        $build->zip_file = $zip_file;
        $build->save();

        $build->users()->attach(Auth::id());

        foreach ($this->components as $component) {
            $components_json = json_encode($component['inputs']);

            $jatos_component = new JatosComponent();
            $jatos_component->title = $component['title'];
            $jatos_component->json = $components_json;
            $jatos_component->save();
            $build->jatos_components()->sync($jatos_component->id);
        }

        $json_inputs = json_encode($this->components);
        Storage::put('json/' . $json_file, $json_inputs);

        session()->flash('message', 'Project successfully updated.');
    }

    public function build()
    {
        $build = Build::find($this->build_id);

        $pages = '';
        foreach ($build->jatos_components as $key => $component) {
            $pages .= Str::replace(' ', '_', $component['title']) . ' ';
        }
        $pages = rtrim($pages, ' ');

        $data = [
            'title' => $build->title,
            'file_name' => $build->jas_json_file_name,
            'pages' => $pages,
            'images' => $this->images,
        ];

        \App\Jobs\BuildProject::dispatch($data);

        $this->emit('builded');

        $this->building = false;

        $this->dispatchBrowserEvent('finish-build');

        session()->flash('message', 'Project successfully builded.');
    }

    public function download()
    {
        $build = Build::find($this->build_id);

        return Storage::download('public/' . $build->zip_file);
    }

    public function render()
    {
        return view('livewire.builder');
    }
}
