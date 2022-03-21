@extends('layouts.admin')
@section('container')
<h1 class="mt-4">Data Komunitas</h1>
<div class="container">
    @if (session('flash'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('flash') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Nama Komunitas</th>
                <th>Tanggal Pembuatan</th>
                <th>Pembuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($komunitas as $row)
            <tr>
                <td><a href="/komunitas/{{$row->id}}">{{ucwords($row['nama_komunitas'])}}</a></td>
                <td>{{date("d M Y",strtotime($row['created_at']))}}</td>
                <td>{{$row->user->nama}}</td>
                <td><a href="komunitas/destroy/{{$row->id}}" onclick="return confirm('apakah anda yakin?')" class="btn btnFire btn-sm btn-danger">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
