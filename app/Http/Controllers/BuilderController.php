<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\{ Build, User };

class BuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $builds = Build::all();
        return view('builder.index', ['builds' => $builds]);
    }

    public function new()
    {
        return view('builder.new');
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $file = Str::replace(' ', '_', $title);

        $jas = [
            'version' => "3",
            'data' => [
                'uuid' => Str::uuid()->toString(),
                'title' => $title,
                'description' => $request->description,
                'active' => true,
                'groupStudy' => false,
                'linearStudy' => false,
                'dirName' => $file,
                'comments' => "",
                'jsonData' => null,
                'endRedirectUrl' => "",
                'componentList' => array(
                    [
                        'uuid' => Str::uuid()->toString(),
                        'title' => $title,
                        'htmlFilePath' => 'index.html',
                        'reloadable' => true,
                        'active' => true,
                        'comments' => '',
                        'jsonData' => null
                    ]
                ),
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

        $jas_json = json_encode($jas);

        $randomString = "";
        for ($i = 0; $i < 18; $i++) {
            $randomString .= (string)rand(0, 9);
        }

        $jas_file = $file. $randomString. '.jas';
        $zip_file = $file. '.zip';

        Storage::put($jas_file, $jas_json);

        $build = new Build;
        $build->name = $title;
        $build->description = $request->description;
        $build->jas = $jas_json;
        $build->jas_file = $jas_file;
        $build->zip_file = $zip_file;
        $build->save();

        $build->users()->attach(Auth::id());

        return view('builder.builder', ['build' => $build]);
    }

    public function show(Build $build)
    {
        return view('builder.builder', ['build' => $build]);
    }

    public function build(Request $request)
    {
        $build_id = $request->id;

        $build = Build::find($build_id);
        $data = [
            'title' => $build->name,
            'jas' => $build->jas_file,
        ];

        \App\Jobs\BuildProject::dispatch($data);

        return response([ 'id' => $build->id, 'name' => $build->name], 200);
    }

    public function download(Request $request)
    {
        $build = Build::find($request->id);

        return Storage::download('public/'.$build->zip_file);
    }
}