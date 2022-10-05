<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use File;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::paginate(20);

        return view('gallery', ['images' => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,jpg,png,gif|max:8000',
            'title' => 'required|unique:galleries,title',
        ]);

        if ($request->hasFile('image')) {
            $images = $request->file('image');

            $org_img = $thm_img = true;

            if (! File::exists('images/gallery/originals/')) {
                $org_img = File::makeDirectory(public_path('images/gallery/originals/'), 0777, true);
            }
            if (! File::exists('images/gallery/thumbnails/')) {
                $thm_img = File::makeDirectory(public_path('images/gallery/thumbnails'), 0777, true);
            }

            foreach ($images as $key => $image) {
                $gallery = new Gallery;

                $name = rand(1111, 9999) . time();

                $filename = $name . '.' . $image->getClientOriginalExtension();

                $org_path = 'images/gallery/originals/' . $filename;
                $thm_path = 'images/gallery/thumbnails/' . $filename;

                $gallery->image = 'images/gallery/originals/' . $filename;
                $gallery->thumbnail = 'images/gallery/thumbnails/' . $filename;

                $gallery->title = count($images) ? $request->title . '-' . $key : $request->title;

                if (! $gallery->save()) {
                    session()->flash('danger', 'Gallery could not be updated.');

                    return redirect()->back()->withInput();
                }

                if (($org_img && $thm_img) == true) {
                    Image::make($image)->fit(900, 500, function ($constraint) {
                        $constraint->upsize();
                    })->save($org_path);
                    Image::make($image)->fit(270, 160, function ($constraint) {
                        $constraint->upsize();
                    })->save($thm_path);
                }
            }
        }

        session()->flash('success', 'Image uploaded successfully.');

        return redirect()->action([GalleryController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $image = Gallery::findOrFail($request->id);

        if ($image->status == 1) {
            $image->status = 0;
            $status = 'disabled';
        } else {
            $image->status = 1;
            $status = 'enabled';
        }

        if (! $image->save()) {
            session()->flash('danger', 'Image could not be reverted.');

            return redirect()->route('gallery.index');
        }

        session()->flash('success', 'Image has been successfully ' . $status);

        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->delete()) {
            session()->flash('success', 'Image successfully deleted.');
        } else {
            session()->flash('danger', 'Image could not be deleted.');
        }

        return redirect()->route('gallery.index');
    }
}
