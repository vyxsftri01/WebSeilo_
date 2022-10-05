@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data media
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $profile->user->name }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="text" class="form-control" name="foto" value="{{ $profile->media->url }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">NISN</label>
                            <input type="text" class="form-control" name="nisn" value="{{ $media->nisn }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ $media->tanggal_lahir }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" value="{{ $media->jenis_kelamin }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ $media->alamat }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kontak</label>
                            <input type="date" class="form-control" name="no_hp" value="{{ $media->no_hp }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Sekolah</label>
                            <input type="date" class="form-control" name="nama_sekolah" value="{{ $media->nama_sekolah }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jurusan</label>
                            <input type="date" class="form-control" name="jurusan" value="{{ $media->jurusan }}" readonly>
                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('profile.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
