@extends('layouts.admin')

@section('container')
    <form action="{{ route('resep.update', $resep->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <h1 class="mt-4">Edit Resep</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('resep.index') }}"
                    class="nav-link p-0">{{ auth()->user()->id == 1 ? 'Data Resep' : 'Resep saya' }}</a></li>
            <li class="breadcrumb-item active">Edit Resep</li>
        </ol>
        <button type="submit" class="btn btn-success mb-3">Simpan</button>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <select name="kategori" id="kategori" class="form-control @error('kategori') is-invalid @enderror">
                <option disabled>Pilih Kategori</option>
                @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ $kategori->id == $resep->id_kategori? 'selected':'' }}>{{ $kategori->kategori }}</option>
                @endforeach
                </select>
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Makanan</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $resep->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="body" class="col-sm-2 col-form-label">Isi</label>
            <div class="col-sm-10">
                <input type="hidden" class="@error('body') is-invalid @enderror" name="body" id="body" value="{{ old('body', $resep->body) }}">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" accept="image/*" name="gambar" class="form-control @error('gambar') is-invalid @enderror" value="{{ old('gambar', $resep->gambar) }}">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3 row">
            <label for="video" class="col-sm-2 col-form-label">Video</label>
            <div class="col-sm-10">
                <input type="file" accept="video/*" name="video" class="form-control @error('video') is-invalid @enderror" value="{{ old('video', $resep->video) }}">
                @error('video')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </form>
@endsection
