@extends('layouts.main')
@section('container')
    <h1 class="mt-4">Hasil Pencarian {{ $cari }}</h1>
    {{-- @php
        dd($reseps)
    @endphp --}}
    <div class="row mt-3">
        {{-- <p>lorem100</p> --}}
        <div class="col offset-md-1 mb-1">
            @if (!empty($reseps))
                @foreach ($reseps as $resep)
                <div class="row">
                    <div class="col-auto">
                        <img width="50" class="___class_+?5___" src="assets/img/hat.png" alt="">
                    </div>
                    <div class="col-auto">
                        <a href="{{ empty($resep->video)?'/read/'.$resep->id:'/watch/'.$resep->id}}" class="nav-link p-0 text-dark">
                            <h5>{{ $resep->nama }} <span class="text-primary">{{ $resep->kategori->kategori }}</span></h5>
                        </a>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">by Chef {{ $resep->user->nama }}</li>
                            <li class="breadcrumb-item active">uploaded {{ $resep->created_at->format('d/m/Y') }}</li>
                        </ol>
                    </div>
                </div>
                @endforeach
            @else
            <div class="text-center">
                <h3 class="mt-5">Hasil Pencarian Tidak Ditemukan</h3>
                <a href="/">Kembali ke Home</a>
            </div>
            @endif
        </div>
    </div>
@endsection
