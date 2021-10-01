@extends('layouts.auth')
@section('container')
    <div class="text-center">
        <h5>!Resebu!<img src="assets/img/hat.png" class="img-fluid pb-3" style="width: 100px" alt=""></h5>
        {{-- <h2>Selamat Datang</h2> --}}
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto ">
            <div class="bg-dark px-3 pt-2">
                <div class=" pb-5">
                    <div class="text-center text-light mb-5 my-auto">
                        <h2>Selamat Datang</h2>
                    </div>
                    <form action="/register" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="nama" value="{{ old('nama') }}" type="text"
                                class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama"
                                autofocus>
                            <label for="nama">Nama Lengkap</label>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="username" value="{{ old('username') }}" type="text"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="Username">
                            <label for="username">Username</label>
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" value="{{ old('email') }}" type="text"
                                class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email">
                            <label for="email">Email</label>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="nomor" value="{{ old('nomor') }}" type="text"
                                class="form-control @error('nomor') is-invalid @enderror" id="nomor"
                                placeholder="Nomor Telepon">
                            <label for="nomor">Nomer Telepon</label>
                            @error('nomor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-light w-100">Daftar</button>
                        <div class="text-left">
                            <a href="/login" class="p-0 mt-2 nav-link">Sudah punya akun? Kenapa menunggu lagi, buruan
                                masuk</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
