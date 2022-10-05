<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Media;
use Illuminate\Http\Request;

class ActivityController extends Controller
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
        //menampilkan semua data dari model activity
        $activity = Activity::all();
        return view('activity.index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $media = Media::all();
        return view('activity.create', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'id_media' => 'required',
            'title' => 'required',
            'deskripsi' => 'required',

        ]);

        $activity = new Activity();
        $activity->id_media = $request->id_media;
        $activity->title = $request->title;
        $activity->deskripsi = $request->deskripsi;

        $activity->save();
        return redirect()->route('activity.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        $media = Media::all();
        return view('activity.edit', compact('activity','media'));

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
        // Validasi
        $validated = $request->validate([
            'id_media' => 'required',
            'title' => 'required',
            'deskripsi' => 'required',

        ]);

        $activity = Activity::findOrFail($id);
        $activity->id_media = $request->id_media;
        $activity->title = $request->title;
        $activity->deskripsi = $request->deskripsi;

        $activity->save();
        return redirect()->route('activity.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->route('activity.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
