<?php

namespace App\Http\Livewire;

use App\Models\Build;
use App\Models\JatosComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Builder extends Component
{
    use WithFileUploads;

    public $build_id = false;

    public $build_title;

    public $build_description;

    public $build_file_name;

    public $input_id = 0;

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
        'removeInput' => 'removeInput',
        'removeComponent' => 'removeComponent',
        'add_builder' => 'add_builder',
    ];

    public function mount($build, $json = false)
    {
        if ($json) {
            $this->components = json_decode($json, true);
            $this->preload = true;
        }

        if ($build->id) {
            $this->loadBuild($build);
        }

        $this->build_title = $build->title;
        $this->build_description = $build->description;
    }

    public function hydrate()
    {
        $this->preload = false;
    }

    public function loadBuild($build)
    {
        $this->build_id = $build->id;
        $this->build_file_name = $build->jas_json_file_name;
        $this->preload = true;
        foreach ($build->jatos_components as $key => $component) {
            $this->addComponent($component->title);
            $inputs = json_decode($component->json, true);
            $this->components[$this->active_component]['inputs'] = $inputs;
        }
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
        if (! count($this->components)) {
            return;
        }
        if (! array_key_exists($key, $this->components)) {
            $key = 0;
        }
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
    }

    public function addInput($type)
    {
        if (count($this->components) < 1) {
            session()->flash('warning', 'No component selected');

            return;
        }

        if ($type == 'audio') {
            foreach ($this->components[$this->active_component]['inputs']as $key => $value) {
                if ($value['type'] == 'audio') {
                    session()->flash('warning', 'There can only be one audio per component');

                    return;
                }
            }
        }

        $input = \App\Constants\Component::LIST[$type];

        $this->components[$this->active_component]['inputs'][] = [
            'id' => ++$this->input_id,
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

    private function save_fields()
    {
        $dom = new \DomDocument;

        foreach ($this->components as $key => $component) {
            foreach ($this->components[$key]['inputs'] as &$input) {
                if ($input['type'] == 'input') {
                    $input['fields'] = json_decode($input['fields']);

                    continue;
                }

                if (empty($input['contents'])) {
                    continue;
                }

                $dom->loadHtml($input['contents'], LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                $images = $dom->getElementsByTagName('img');
                foreach ($images as $key => $image) {
                    $image_name = $image->getAttribute('src');
                    $this->images[] = $image_name;
                }
            }
        }
    }

    public function store($is_private)
    {        
        $this->save_fields();

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

        $build = new Build;
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
            $components_json = json_encode($this->components[$c_key]['inputs']);

            $jatos_component = new JatosComponent;
            $jatos_component->title = $component['title'];
            $jatos_component->json = $components_json;
            $jatos_component->save();
            $build->jatos_components()->attach($jatos_component->id);
        }

        $json_inputs = json_encode($this->components);

        Storage::put('json/' . $json_file, $json_inputs);

        session()->flash('message', 'Project successfully created.');

        return redirect()->to('/builder/' . $build->id . '/edit');
    }

    public function update($is_private)
    {
        $this->save_fields();

        $file = Str::replace(' ', '_', $this->build_title);

        $jas_json = $this->createJasJson($file);

        $file_name = $this->build_file_name;
        $jas_file = $file_name . '.jas';
        $json_file = $file_name . '.json';

        Storage::put('jas/' . $jas_file, $jas_json);

        $build = Build::find($this->build_id);

        $build->jas = $jas_json;
        $build->is_private = $is_private ? true : false;
        $build->save();

        $build->jatos_components()->detach();
        foreach ($this->components as $component) {
            $components_json = json_encode($component['inputs']);

            $jatos_component = new JatosComponent;
            $jatos_component->title = $component['title'];
            $jatos_component->json = $components_json;
            $jatos_component->save();
            $build->jatos_components()->attach($jatos_component->id);
        }

        $json_inputs = json_encode($this->components);
        Storage::put('json/' . $json_file, $json_inputs);

        session()->flash('message', 'Project successfully updated.');

        return redirect(request()->header('Referer'));
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

    public function removeInput($key)
    {
        array_splice($this->components[$this->active_component]['inputs'], $key, 1);
    }

    public function removeComponent($key)
    {
        array_splice($this->components, $key, 1);
        $this->setActive($key - 1);
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
