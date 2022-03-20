@extends('layouts.main')
@section('container')
    <div class="py-4" style="background-image: url('/assets/img/banner.jpg')">
        <div style="background-color: rgba(94, 94, 92, 0.6)">
            <div class="row text-light">
                <div class="col-8">
                    <div class="p-2">
                        <h1 class="display-3">{{ ucwords($komunitas->nama_komunitas) }}</h1>
                        <p class="lead ms-4"><strong>Bergabung Resebu sejak
                                {{ date('d M Y', strtotime($komunitas->created_at)) }}</strong></p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="p-2">
                        <h5> <span class="display-6">Alamat</span></h5>
                        <hr>
                        <small id="editAlamat">{{ ucwords($komunitas->alamat) }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>Anggota</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (json_decode($komunitas->peserta) as $p)
                        <tr>
                            <td>{{ $p }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-9">
            <div class="row">
                <h5> <span class="display-5">Bio</span></h5>
                <hr>
                <p id="editBio" class="lead">{{ $komunitas->bio }}</p>
            </div>
        </div>
    </div>
    </form>
    <script>
        var get = e => document.querySelector(e);
        get('#batalAlamat').addEventListener('click', e => {
            e.preventDefault();
            get('#editAlamat').style.display = 'block';
            get('.form_alamat').style.display = 'none';
        })
        get('.edit_alamat').addEventListener('click', e => {
            e.preventDefault();
            get('#editAlamat').style.display = 'none';
            get('.form_alamat').style.display = 'block';
        })
        get('#batalBio').addEventListener('click', e => {
            e.preventDefault();
            get('#editBio').style.display = 'block';
            get('.form_bio').style.display = 'none';
        })
        get('.edit_bio').addEventListener('click', e => {
            e.preventDefault();
            get('#editBio').style.display = 'none';
            get('.form_bio').style.display = 'block';
        })
    </script>
@endsection
