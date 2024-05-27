<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="">{{ env('APP_NAME') }}</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href=""></a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main Menu</li>
        <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fire"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i>
                <span>Dropdown Menu</span>
            </a>
            <ul class="dropdown-menu">
                <li><a href="#">Dropdown Item</a></li>
            </ul>
        </li> --}}

        @can('admin')
            <li class="menu-header">Administrator</li>
            <li class="{{ Route::is('user*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Manage Users</span>
                </a>
            </li>
            <li class="{{ Route::is('pasien*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pasien.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Pasiens</span>
                </a>
            </li>
            <li class="{{ Route::is('dokter*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dokter.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Dokter</span>
                </a>
            </li>
            <li class="{{ Route::is('jadwal-dokter*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jadwal-dokter.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Jadwal Dokter</span>
                </a>
            </li>
            <li class="{{ Route::is('ruangan*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ruangan.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Ruangan</span>
                </a>
            </li>
            <li class="{{ Route::is('antrean*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('antrean.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Antrean</span>
                </a>
            </li>
            <li class="{{ Route::is('rekam-medis*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('rekam-medis.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Rekam Medis</span>
                </a>
            </li>
            <li class="{{ Route::is('konsultasi-dokter*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('konsultasi-dokter.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Konsultasi Dokter</span>
                </a>
            </li>
            <li class="{{ Route::is('berita*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('berita.index') }}">
                    <i class="fas fa-user"></i>
                    <span>Manage Berita</span>
                </a>
            </li>    
        @endcan
    </ul>
</aside>
