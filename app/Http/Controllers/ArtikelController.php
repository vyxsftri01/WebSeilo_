<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;

class ArtikelController extends Controller
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
        //menampilkan semua data dari model artikel
        $artikel = Artikel::all();
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::all();
        $media = Media::all();
        return view('artikel.create', compact('user','media'));
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
            'id_users' => 'required',
            'id_media' => 'required',
            'title' => 'required',
            'body' => 'required',

        ]);

        $artikel = new Artikel();
        $artikel->id_users = $request->id_users;
        $artikel->id_media = $request->id_media;
        $artikel->title = $request->title;
        $artikel->body = $request->body;

        $artikel->save();
        return redirect()->route('artikel.index')
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
        $artikel = Artikel::findOrFail($id);
        return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        $user = User::all();
        $media = Media::all();
        return view('artikel.edit', compact('artikel', 'user', 'media'));

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
            'id_users' => 'required',
            'id_media' => 'required',
            'title' => 'required',
            'body' => 'required',

        ]);

        $artikel = Artikel::findOrFail($id);
        $artikel->id_users = $request->id_users;
        $artikel->id_media = $request->id_media;
        $artikel->title = $request->title;
        $artikel->body = $request->body;

        $artikel->save();
        return redirect()->route('artikel.index')
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
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        return redirect()->route('artikel.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
