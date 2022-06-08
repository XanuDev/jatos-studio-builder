<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class BuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('builder.new');
    }

    public function new(Request $request)
    {
        $title = $request->title;
        $file = Str::replace(' ', '_', $title);

        $jas = [
            'version' => "3",
            'data' => [
                'uuide' => Str::uuid()->toString(),
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

        $file_name = $file. $randomString. '.jas';

        Storage::put($file_name, $jas_json);

        dd($jas_json);
        return view('builder.builder');
    }

    public function build()
    {
        $data = [
            'title' => 'test'
        ];

        \App\Jobs\BuildProject::dispatch($data);

        return view('home');
    }
}
