@extends('layouts.admin')
@section('container')
    <h1 class="mt-4">Data User</h1>
    @if (session('flash'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('flash') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <table id="example" class="table table-striped w-100">
        <thead>
            <tr>
                <th>#</th>
                <th>Name Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="">
            <td>{{ $loop->iteration }}</td>
            <td><a href="/dashboard/profil/{{ $user->id }}" class="nav-link p-0">{{ $user->nama }}</a></td>
                    <td><a href="/dashboard/profil/{{ $user->id }}" class="nav-link p-0 text-dark">{{ $user->username }}</a></td>
                    <td><a href="/dashboard/profil/{{ $user->id }}" class="nav-link p-0 text-dark">{{ $user->email }}</a></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $loop->iteration }}">
                            Hapus
                        </button>
                        {{-- <a href="" class="btn offset-2 btn-danger">Hapus</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>

    <!-- Modal -->
    @foreach ($users as $user)
        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin <strong>menghapus</strong> user <span class="text-danger">{{ $user->nama }}
                        </span>ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="/user/{{ $user->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
