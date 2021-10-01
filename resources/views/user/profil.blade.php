@extends('layouts.auth')
@section('container')
<div class="container">
    <h1 class="mt-0">Profil</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">by Chef Dashboard</li>
    </ol> --}}
    @if (session('flash'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('flash') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('updateError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('updateError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (($user->alamat==null)||(($user->t_lahir==null)||($user->tgl_lahir==null)))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Lengkapi juga informasi anda!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <form action="/profil" method="POST" >
        @method('post')
        @csrf
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama',$user->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" name="username" readonly class="form-control-plaintext " value="{{ $user->username }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tempat" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-4">
                        <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror"
                            value="{{ old('tempat',$user->t_lahir) }}">
                        @error('tempat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-sm-8">
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ old('tanggal',$user->tgl_lahir) }}">
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea name="alamat" class="@error('alamat') is-invalid @enderror form-control" cols="2" rows="5">{{ old('alamat',$user->alamat) }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password1" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10">
                <input type="password" name="password1" class="@error('password1') is-invalid @enderror form-control">
                @error('password1')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password2" class="col-sm-2 col-form-label">Password Lama</label>
            <div class="col-sm-10">
                <input type="password" name="password2" class="form-control @error('password2') is-invalid @enderror">
                @error('password2')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn mt-3 btn-success w-25 text-center me-2">Simpan Perubahan</button>
        <a href="/" class="btn btn-danger w-25 text-center mt-3">Batal</a>
    </form>
</div>
@endsection
