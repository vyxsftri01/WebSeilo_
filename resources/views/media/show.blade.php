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
                            <input type="text" class="form-control" name="name" value="{{ $media->name }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Size</label>
                            <input type="text" class="form-control" name="size" value="{{ $media->size }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ekstensi</label>
                            <input type="text" class="form-control" name="ekstensi" value="{{ $media->ekstensi }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Media</label>
                            @if (isset($media) && $media->url)
                                <p>
                                    <img src="{{ asset('images/media/' . $media->url) }}" class="img-rounded img-responsive"
                                        style="width: 75px; height:75px;" alt="">
                                </p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('media.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
