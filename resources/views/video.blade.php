@extends('layouts.main')
@section('container')
    {{-- @dd($resep->kategori->kategori) --}}
    <h1 class="mt-4">{{ $resep->nama }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $resep->user->nama }} <span
                class="badge bg-danger ms-3">{{ $resep->kategori->kategori }}</span></li>
    </ol>
    <div class="row">
        <div class="col-9">
            <div class="text-center">
                {{-- <iframe height="480" width="720" src="https://www.youtube.com/embed/kg1BljLu9YY?list=RDkg1BljLu9YY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                <video width="720" height="480" controls>
                    <source src="{{ URL::asset('storage/videos/' . $resep->video) }}" type="video/mp4">
                </video>
            </div>
            <div class="mt-3 text-center">
                <a href="/read/{{ $resep->id }}" class="btn btn-primary w-50">Baca Versi Artikelnya</a>
            </div>
        </div>
        <div class="col-3">
            <h5 class="border border-0 border-bottom pb-3">Video Lainnya</h5>
            @foreach ($videos as $video)
                <div class="card border mb-2 border-0 border-bottom border-3 border-dark">
                    <div class="card-body text-center">
                        <a href="/watch/{{ $video->id }}" class="nav-link p-0">
                            <img height="80px" width="80px" src="{{ URL::asset('storage/images/' . $video->gambar) }}"
                                alt="{{ $video->gambar }}">
                        </a>
                        <div class="card-text">
                            <strong class="mb-3 me-4 text-dark">
                                {{ $video->nama }}
                            </strong>
                        </div>
                    </div>
                </div>
            @endforeach
        @endsection
