{{-- =========================================================
     SIDEBAR ADMIN / SUPER ADMIN
     TK MEKAR TIGO JANGKO
========================================================= --}}

<aside class="left-sidebar">

    {{-- =====================================================
         BRAND
    ====================================================== --}}
    <div class="brand-logo">

        <div class="brand-icon">
            <i class="ti ti-school"></i>
        </div>

        <div class="brand-title">
            <strong>TK MEKAR TIGO JANGKO</strong>
            <span>Sistem Informasi Sekolah</span>
        </div>

    </div>


    @auth

        {{-- =================================================
             PROFILE
        ================================================== --}}
        <div class="sidebar-profile">

            <div class="d-flex align-items-center">

                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>

                <div class="ms-3">

                    <div class="profile-name">
                        {{ auth()->user()->name }}
                    </div>

                    <div class="profile-role">

                        <span class="profile-role-dot"></span>

                        @if (auth()->user()->role === 'super_admin')
                            Super Admin
                        @elseif (auth()->user()->role === 'admin')
                            Admin
                        @else
                            Pengguna
                        @endif

                    </div>

                </div>

            </div>

        </div>


        {{-- =================================================
             NAVIGATION
        ================================================== --}}
        <nav class="sidebar-nav">

            <ul id="sidebarnav">


                {{-- =================================================
                     UTAMA
                ================================================== --}}
                <li class="menu-section">
                    Utama
                </li>


                {{-- DASHBOARD ADMIN --}}
                @if (auth()->user()->role === 'admin')
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

                            <i class="ti ti-layout-dashboard"></i>

                            <span>Dashboard</span>

                        </a>
                    </li>
                @endif


                {{-- DASHBOARD SUPER ADMIN --}}
                @if (auth()->user()->role === 'super_admin')
                    <li>
                        <a href="{{ route('super.dashboard') }}"
                            class="sidebar-link {{ request()->routeIs('super.dashboard') ? 'active' : '' }}">

                            <i class="ti ti-layout-dashboard"></i>

                            <span>Dashboard</span>

                        </a>
                    </li>
                @endif


                {{-- =================================================
                     DATA SEKOLAH
                ================================================== --}}
                <li class="menu-section">
                    Data Sekolah
                </li>


                {{-- KEPALA SEKOLAH --}}
                <li>
                    <a href="{{ route('admin.kepala-sekolah.index') }}"
                        class="sidebar-link {{ request()->routeIs('admin.kepala-sekolah.*') ? 'active' : '' }}">

                        <i class="ti ti-user-star"></i>

                        <span>Kepala Sekolah</span>

                    </a>
                </li>


                {{-- PROFIL SEKOLAH --}}
                <li>
                    <a href="{{ route('profil.index') }}"
                        class="sidebar-link {{ request()->routeIs('profil.*') ? 'active' : '' }}">

                        <i class="ti ti-school"></i>

                        <span>Profil Sekolah</span>

                    </a>
                </li>


                {{-- SEJARAH SEKOLAH --}}
                <li>
                    <a href="{{ route('admin.sejarah-sekolah.index') }}"
                        class="sidebar-link {{ request()->routeIs('admin.sejarah-sekolah.*') ? 'active' : '' }}">

                        <i class="ti ti-history"></i>

                        <span>Sejarah Sekolah</span>

                    </a>
                </li>


                {{-- VISI & MISI --}}
                <li>
                    <a href="{{ route('visi-misi.index') }}"
                        class="sidebar-link {{ request()->routeIs('visi-misi.*') ? 'active' : '' }}">

                        <i class="ti ti-target"></i>

                        <span>Visi &amp; Misi</span>

                    </a>
                </li>


                {{-- DATA GURU --}}
                <li>
                    <a href="{{ route('guru.index') }}"
                        class="sidebar-link {{ request()->routeIs('guru.*') ? 'active' : '' }}">

                        <i class="ti ti-users"></i>

                        <span>Data Guru</span>

                    </a>
                </li>


                {{-- FASILITAS --}}
                <li>
                    <a href="{{ route('fasilitas.index') }}"
                        class="sidebar-link {{ request()->routeIs('fasilitas.*') ? 'active' : '' }}">

                        <i class="ti ti-building"></i>

                        <span>Fasilitas</span>

                    </a>
                </li>


                {{-- STRUKTUR ORGANISASI --}}
                <li>
                    <a href="{{ route('struktur-organisasi.index') }}"
                        class="sidebar-link {{ request()->routeIs('struktur-organisasi.*') ? 'active' : '' }}">

                        <i class="ti ti-sitemap"></i>

                        <span>Struktur Organisasi</span>

                    </a>
                </li>


                {{-- =================================================
                     PUBLIKASI
                ================================================== --}}
                <li class="menu-section">
                    Publikasi
                </li>


                {{-- GALERI --}}
                <li>
                    <a href="{{ route('galeri.index') }}"
                        class="sidebar-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}">

                        <i class="ti ti-photo"></i>

                        <span>Galeri</span>

                    </a>
                </li>


                {{-- BERITA --}}
                <li>
                    <a href="{{ route('berita.index') }}"
                        class="sidebar-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">

                        <i class="ti ti-news"></i>

                        <span>Berita</span>

                    </a>
                </li>


                {{-- =================================================
                     PENERIMAAN
                ================================================== --}}
                <li class="menu-section">
                    Penerimaan
                </li>


                {{-- PPDB --}}
                <li>
                    <a href="{{ route('ppdb.index') }}"
                        class="sidebar-link {{ request()->routeIs('ppdb.*') ? 'active' : '' }}">

                        <i class="ti ti-file-description"></i>

                        <span>PPDB</span>

                    </a>
                </li>


                {{-- DATA PENDAFTARAN --}}
                <li>
                    <a href="{{ route('admin.pendaftaran.index') }}"
                        class="sidebar-link {{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">

                        <i class="ti ti-clipboard-text"></i>

                        <span>Data Pendaftaran</span>

                    </a>
                </li>


                {{-- =================================================
                     INFORMASI
                ================================================== --}}
                <li class="menu-section">
                    Informasi
                </li>


                {{-- PAPAN INFORMASI --}}
                <li>
                    <a href="{{ route('admin.informasi.index') }}"
                        class="sidebar-link {{ request()->routeIs('admin.informasi.*') ? 'active' : '' }}">

                        <i class="ti ti-info-circle"></i>

                        <span>Papan Informasi</span>

                    </a>
                </li>


                {{-- KONTAK --}}
                <li>
                    <a href="{{ route('kontak.index') }}"
                        class="sidebar-link {{ request()->routeIs('kontak.*') ? 'active' : '' }}">

                        <i class="ti ti-phone"></i>

                        <span>Kontak</span>

                    </a>
                </li>


                {{-- =================================================
                     KHUSUS SUPER ADMIN
                ================================================== --}}
                @if (auth()->user()->role === 'super_admin')
                    <li class="menu-section">
                        Administrasi
                    </li>


                    {{-- MANAJEMEN PENGGUNA --}}
                    <li>

                        <a href="{{ route('users.index') }}"
                            class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">

                            <i class="ti ti-users"></i>

                            <span>Manajemen Pengguna</span>

                        </a>

                    </li>


                    {{-- AUDIT LOG --}}
                    <li>

                        <a href="{{ route('super.logs') }}"
                            class="sidebar-link {{ request()->routeIs('super.logs') ? 'active' : '' }}">

                            <i class="ti ti-history"></i>

                            <span>Audit Log</span>

                        </a>

                    </li>
                @endif


            </ul>

        </nav>

    @endauth


    {{-- =====================================================
         FOOTER
    ====================================================== --}}
    <div class="sidebar-footer">

        @auth

            <form action="{{ route('logout') }}" method="POST" class="m-0">

                @csrf

                <button type="submit" class="sidebar-logout">

                    <i class="ti ti-logout"></i>

                    <span>Keluar</span>

                </button>

            </form>

        @endauth


        <small>
            &copy; {{ date('Y') }} TK Mekar Tigo Jangko
        </small>

    </div>

</aside>
