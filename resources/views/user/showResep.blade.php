@extends('layouts.admin')
@section('container')
    <h1 class="mt-4">Resep</h1> <small>oleh {{ $resep->user->nama }}</small>
    <div class="badge bg-danger">{{ $resep->kategori->kategori }}</div>
    <div><small class="me-auto">Pada {{ $resep->updated_at->format('d F, Y') }}</small></div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('resep.index') }}" class="nav-link p-0">Data Resep</a></li>
        <li class="breadcrumb-item active">Lihat Resep</li>
    </ol>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Makanan</label>
        <div class="col-sm-10">
            <input type="text" name="nama" class="form-control-plaintext border-0" value="{{ $resep->nama }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="body" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <article
                class="">    
                     {!! $resep->body !!}
                </article>
            </div>
        </div>
        <div class="
                mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <img class="col-lg-3 img-responsive" src="{{ URL::asset('storage/images/' . $resep->gambar) }}" alt="">
                </div>
        </div>

        @if ($resep->id_kategori == 2)
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Video</label>
                <div class="col-sm-10">
                    <video src="{{ URL::asset('assets/videos/' . $resep->video) }}" width="720" class="border border-dark"
                        controls></video>
                </div>
            </div>
        @endif
    @endsection
