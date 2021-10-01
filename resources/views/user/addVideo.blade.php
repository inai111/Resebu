@extends('layouts.admin')
@section('sidenav')
<div class="nav">
    <div class="sb-sidenav-menu-heading">Core</div>
    <a class="nav-link" href="myresep">
        Resep Saya
    </a>
    <a class="nav-link active" href="myvideo">
        Video Saya
    </a>
</div>
@endsection
@section('container')
    <h2 class="mt-4">Upload Video</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="myvideo" class="nav-link p-0">Video saya</a></li>
        <li class="breadcrumb-item active">Upload Video</li>
    </ol>
    <form action="/add-video" method="post">
        <button class="btn btn-success mb-3">Simpan</button>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Video</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" placeholder="Ikan Asin ">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="body" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">File Video</label>
            <div class="col-sm-10">
                <input type="file" name="video" accept="video/*" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" name="gambar" accept="image/*" class="form-control">
            </div>
        </div>
    </form>
@endsection
