<?php

namespace App\Http\Controllers;

use App\Models\ActivityMedia;
use App\Models\Media;
use App\Models\Activity;
use Illuminate\Http\Request;

class activitymediaMediaController extends Controller
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
        //menampilkan semua data dari model activitymedia
        $activitymedia = ActivityMedia::all();
        return view('activitymedia.index', compact('activitymedia'));
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
        $media = Media::all();
        return view('activitymedia.create', compact('media','activitymedia'));
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
            'id_activity' => 'required',
            'id_media' => 'required',

        ]);

        $activitymedia = new ActivityMedia();
        $activitymedia->id_media = $request->id_media;
        $activitymedia->id_activity = $request->id_activity;

        $activitymedia->save();
        return redirect()->route('activitymedia.index')
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
        $activitymedia = ActivityMedia::findOrFail($id);
        return view('activitymedia.show', compact('activitymedia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activitymedia = ActivityMedia::findOrFail($id);
        $media = Media::all();
        $activity = Activity::all();
        return view('activitymedia.edit', compact('activitymedia','media','activity'));

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
            'id_activity' => 'required',

        ]);

        $activitymedia = ActivityMedia::findOrFail($id);
        $activitymedia->id_media = $request->id_media;
        $activitymedia->id_activity = $request->id_activity;
        $activitymedia->save();
        return redirect()->route('activitymedia.index')
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
        $activitymedia = ActivityMedia::findOrFail($id);
        $activitymedia->delete();
        return redirect()->route('activitymedia.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
