<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {

        $media = Media::all();
        return view('media.index', compact('media'));
    }

    public function create()
    {
        return view('media.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'size' => 'required',
            'ekstensi' => 'required',
            'url' => 'required|image|max:2048',

        ]);

        $media = new Media();
        $media->name = $request->name;
        $media->size = $request->size;
        $media->ekstensi = $request->ekstensi;
        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/media/', $name);
            $media->url = $name;
        }
        $media->save();
        return redirect()->route('media.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    public function show($id)
    {
        $media = Media::findOrFail($id);
        return view('media.show', compact('media'));
    }

    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('media.edit', compact('media'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'size' => 'required',
            'ekstensi' => 'required',
            'url' => 'image|max:2048',
        ]);

        $media = Media::findOrFail($id);
        $media->name = $request->name;
        $media->size = $request->size;
        $media->ekstensi = $request->ekstensi;
        if ($request->hasFile('url')) {
            $media->deleteImage(); //menghapus url sebelum di update melalui method deleteImage di model
            $image = $request->file('url');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/media/', $name);
            $media->url = $name;
        }
        $media->save();
        return redirect()->route('media.index')
            ->with('success', 'Data berhasil diedit!');

    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);
        $media->deleteImage();
        $media->delete();
        return redirect()->route('media.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}
