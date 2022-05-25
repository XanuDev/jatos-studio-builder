<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // create json
        return view('builder.builder');
    }

    public function build()
    {
        $data = [
            'title' => 'test'
        ];

        \App\Jobs\BuildProject::dispatch($data);
    }
}
