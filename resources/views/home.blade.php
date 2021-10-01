@extends('layouts.main')
@section('container')
    <h1 class="mt-4">Videos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Resep Masakan</li>
    </ol>
    <div class="row">
        @foreach ($videos as $video)
            <div class="col-md-4 col-lg-4 me-md-auto col-sm-4 col-4 mb-3 text-center">
                <div class="col-lg-11 p-5 mx-auto border">
                    <a href=" /watch/{{ $video->id }}" class="nav-link w-100">
                        <img class="img-fluid card-img" src="assets/thumbnails/demo.png" alt="">
                    </a>
                </div>
                <a href="/watch/{{ $video->id }}" class="nav-link">
                    <h5 class="m-0">{{ $video->nama }}</h5>
                </a>
                <p class="lh-1"><small>oleh {{ $video->user->nama }}<br>diupload pada
                        {{ $video->created_at->format('d/m/Y') }}</small></p>
            </div>
        @endforeach
    </div>
    <form action="/pencarian" method="post">
        @method('post')
        @csrf
        <input type="hidden" name="video" value="1">
        <button class="btn w-100 btn-secondary">Tampilkan Lebih</button>
    </form>

@endsection
