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
<h1 class="mt-4">Video Saya</h1>
<a href="add-video" class="btn btn-primary my-3">Tambah Video</a>
<table id="example" class="table table-striped w-100">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Video</th>
            <th>Di Upload oleh</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr class="bg-warning">
            <td>20/04/25</td>
            <td>$320,800</td>
            <td>Tiger Nixon</td>
            <td><a href="" class="btn btn-danger">Hapus</a></td>
        </tr>
    </tbody>
</table>
@endsection