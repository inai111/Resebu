@if (auth()->user()->level == 1)
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link {{ Request::is('dashboard*')? 'active':'' }}" href="/dashboard">
            Dashboard
        </a>
        <a class="nav-link {{ Request::is('resep*')? 'active':'' }}" href="{{ route('resep.index') }}">
            Data Resep
        </a>
        <a class="nav-link {{ Request::is('komunitas*')? 'active':'' }}" href="/komunitas">
            {{isset($komunitas)?ucwords($komunitas->nama_komunitas):'Buat Komunitas'}}
        </a>
    </div>
@else
    <div class="nav">
        <div class="sb-sidenav-menu-heading">Core</div>
        <a class="nav-link {{ Request::is('dashboard*')? 'active':'' }}" href="/dashboard">
            Dashboard
        </a>
        <a class="nav-link {{ Request::is('komunitas*')? 'active':'' }}" href="/komunitas">
            {{isset($komunitas)?ucwords($komunitas->nama_komunitas):'Buat Komunitas'}}
        </a>
    </div>
@endif
