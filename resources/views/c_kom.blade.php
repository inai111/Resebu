@extends('layouts.admin')
@section('container')
    <h1 class="mt-4">Komunitas Saya</h1>
    <form action="/komunitas" method="POST">
        @csrf
        <div class="p-5">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Komunitas</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}">
                </div>
            </div>
            <div class="mb-3">
                <label for="peserta" class="form-label">Nama Peserta <small class="text-secondary">(Gunakan koma ( , ) untuk memasukkan banyak nama. Cth. Mamat, Sucipto Nugroho, Agung)</small></label>
                <textarea class="form-control" name="peserta" value="{{ old('peserta') }}" id="peserta" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('nama') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="informasi" class="form-label">Informasi Komunitas</label>
                <textarea class="form-control" name="informasi" id="informasi" rows="3">{{ old('informasi') }}</textarea>
            </div>
            <button type="submit" class="btn w-75 btn-success">Simpan</button>
        </div>
    </form>
@endsection
