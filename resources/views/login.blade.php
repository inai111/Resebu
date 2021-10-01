@extends('layouts.auth')
@section('container')
    {{-- <div class="mx-auto"> --}}
    <div class="text-center">
        <h5>!Resebu!<img src="assets/img/hat.png" class="img-fluid pb-3" style="width: 100px" alt=""></h5>
        {{-- <h2>Selamat Datang</h2> --}}
    </div>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if (session('flash'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('flash') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="bg-dark px-3 pt-2">
                <div class=" pb-5">
                    <div class="text-center text-light mb-5 my-auto">
                        <h2>Selamat Datang</h2>
                    </div>
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input name="username" value="{{ old('username') }}" type="text" class="form-control @error('username')is-invalid @enderror" id="username"
                                placeholder="Username" autofocus>
                            <label for="usernamenput">Username</label>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <button class="btn btn-light w-100">Login</button>
                        <div class="text-left">
                            <a href="/register" class="p-0 mt-2 nav-link">Belum punya akun? Daftar akun baru disini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
