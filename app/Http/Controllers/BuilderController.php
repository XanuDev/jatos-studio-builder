<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $builds = Build::where('user_id', $user)->orWhere('is_private', false)->get();

        return view('builder.index', ['builds' => $builds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('builder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $build = new Build;
        $build->title = $request->title;
        $build->description = $request->description;

        return view('builder.builder', ['build' => $build]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Build $build)
    {
        return view('builder.builder', ['build' => $build]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $build = Build::find($id);

        return view('builder.builder', ['build' => $build]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Build::destroy($id);
        session()->flash('message', 'Build deleted');

        return back();
    }

    public function build_import(Request $request)
    {
        $build = new Build;
        $build->title = $request->title;
        $build->description = $request->description;

        return view('builder.builder', ['build' => $build, 'json' => $request->json]);
    }

    public function import()
    {
        return view('builder.import');
    }

    public function download($id)
    {
        $build = Build::find($id);

        return Storage::download('public/' . $build->zip_file);
    }
}
