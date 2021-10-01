@if (auth()->user()->level == 1)
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link {{ Request::is('dashboard*')? 'active':'' }}" href="/dashboard">
            Dashboard
        </a>
        <a class="nav-link {{ Request::is('resep*')? 'active':'' }}" href="{{ route('resep.index') }}">
            Data Resep
        </a>
    </div>
@else
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link active" href="/dashboard">
            Dashboard
        </a>
    </div>
@endif
