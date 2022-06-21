<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $build = new Build;
        $build->name = $request->title;
        $build->description = $request->description;

        return view('builder.builder', ['build' => $build]);
    }

    public function show(Build $build)
    {
        return view('builder.builder', ['build' => $build]);
    }
}
