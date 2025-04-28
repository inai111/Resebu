<div class="nav">
    <div class="sb-sidenav-menu-heading">Artikel Resep</div>
    @foreach ($sides as $side)
        <div class="ms-3 bg-dark rounded rounded-0">
            <h5 class="text-light">{{ $side->nama }}</h5>
            <ol class="breadcrumb">
                <li class="breadcrumb-item p-0"><small>{{ $side->updated_at->format('d/m/Y') }}</small></li>
                <li class="breadcrumb-item p-0"><small>{{ $side->kategori->kategori }}</small></li>
                <li class="breadcrumb-item p-0"><small>{{ $side->user->nama }}</small></li>
            </ol>
        </div>
        <a href="/read/{{ $side->id }}" class="btn w-100 btn-light btn-sm rounded-0">
            Kunjungi
        </a>
        <hr>
    @endforeach
    <a href="{{ route('all-pencarian') }}" class="btn w-100 btn-light rounded-0">Tampilkan Lebih</a>
</div>
