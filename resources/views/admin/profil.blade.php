@extends('layouts.admin')
@section('container')
    <div class="container">
        <h1 class="mt-0">Profil {{ $user->nama }}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item "><a href="/dashboard" class="nav-link p-0">Data User</a></li>
            <li class="breadcrumb-item active">Profil</li>
        </ol>
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


            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" value="{{ old('nama', $user->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" readonly class="form-control-plaintext "
                        value="{{ $user->username }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tempat" class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="text" readonly class="form-control-plaintext"
                            value="{{ $user->t_lahir ? $user->t_lahir : 'Kosong' }}">
                        </div>
                        <div class="col-sm-8">
                            @if (!empty($user->tgl_lahir))
                            <input type="date" readonly class="form-control-plaintext" value="{{ $user->tgl_lahir }}">
                            @else
                            <input type="text" readonly class="form-control-plaintext" value="Kosong">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea readonly class="form-control-plaintext" cols="2"
                    rows="5">{{ old('alamat', $user->alamat) }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Level Akun</label>
                <div class="col-sm-10">
                    <button type="button" class="btn w-25 btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            {{ $user->level==0?'User':'Admin' }}
                        </button>
                </div>
            </div>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Rubah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin ingin merubah level user <span class="text-danger">{{ $user->nama }}
                    </span>ini ke <span class="text-danger">{{ $user->level==1?'User':'Admin' }}</span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="/dashboard/profil/{{ $user->id }}" method="post">
                        @csrf
                        @method('post')
                        <input type="hidden" name="level" value="{{ $user->level==1?0:1 }}">
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    