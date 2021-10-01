@extends('layouts.main')
@section('container')
<h1 class="mt-4">{{ $resep->nama }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $resep->user->nama }}</li>
    </ol>
    {{-- @dd($resep->gambar) --}}
    <div class="clearfix">
        <img src="{{ URL::asset('storage/images/'.$resep->gambar) }}" class="col-md-4 float-md-end mb-3 ms-md-3" alt="...">
        <p>{!! $resep->body !!}</p>
        @if (!empty($resep->video))
        <a href="/watch/{{ $resep->id }}" class="btn btn-secondary w-25 text-light shadow">Lihat Juga Videonya</a>
        @endif
    </div>
@endsection