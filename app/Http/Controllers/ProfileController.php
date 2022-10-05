<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Media;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        //menampilkan semua data dari model profile
        $profile = Profile::all();
        return view('profile.index', compact('profile'));
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
        return view('profile.create', compact('user','media'));
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
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
        ]);

        $profile = new Profile();
        $profile->id_users = $request->id_users;
        $profile->id_media = $request->id_media;
        $profile->nisn = $request->nisn;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->alamat = $request->alamat;
        $profile->no_hp = $request->no_hp;
        $profile->nama_sekolah = $request->nama_sekolah;
        $profile->jurusan = $request->jurusan;
        $profile->save();
        return redirect()->route('profile.index')
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
        $profile = Profile::findOrFail($id);
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        $user = User::all();
        $media = Media::all();
        return view('profile.edit', compact('profile', 'user', 'media'));

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
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_sekolah' => 'required',
            'jurusan' => 'required',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->id_users = $request->id_users;
        $profile->id_media = $request->id_media;
        $profile->nisn = $request->nisn;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->jenis_kelain = $request->jenis_kelain;
        $profile->alamat = $request->alamat;
        $profile->no_hp = $request->no_hp;
        $profile->nama_sekolah = $request->nama_sekolah;
        $profile->jurusan = $request->jurusan;
        $profile->save();
        return redirect()->route('profile.index')
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
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return redirect()->route('profile.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
