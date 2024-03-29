<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplbar">

        <a class="sidebar-brand d-flex align-items-center py-1" href="/myDashboard/">
            <div class="img navbar-brand py-2">
                <img src="{{ asset('img/logo.png') }}" alt="." width="40px" class="me-3 avatar img-fluid rounded me-1">
            </div>
            <span class="align-middle">Mr. Kodet</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::is('myDashboard') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/myDashboard">
                    <i class="align-middle" data-feather="sliders"></i> 
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('profile*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/profile">
                    <i class="align-middle" data-feather="user"></i> 
                    <span class="align-middle">Profile</span>
                </a>
            </li>
            
            @cannot('pelanggan')
                
                <li class="sidebar-header">
                    Data
                </li>
                
                <li class="sidebar-item {{ Request::is('pesanan/transaksi') ? 'active' : '' }} {{ Request::is('transaksi*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/transaksi">
                        <i class="align-middle" data-feather="book"></i>
                        <span class="align-middle">Data Transaksi</span>
                    </a>
                </li>            
                <li class="sidebar-item {{ Request::is('pesananPelanggan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/pesananPelanggan">
                        <i class="align-middle" data-feather="book"></i>
                        <span class="align-middle">Data Pesanan</span>
                    </a>
                </li>            
                <li class="sidebar-item {{ Request::is('dataPelanggan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/dataPelanggan">
                        <i class="align-middle" data-feather="book"></i>
                        <span class="align-middle">Data Pelanggan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('produk*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/produk">
                        <i class="align-middle" data-feather="book"></i>
                        <span class="align-middle">Data Produk</span>
                    </a>
                </li>

            @endcannot
            
            @can('pelanggan')
            
                <li class="sidebar-header">
                    Pesanan
                </li>

                <li class="sidebar-item {{ Request::is('pesananSaya*') ? 'active' : '' }} {{ Request::is('pesanan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/pesananSaya">
                        <i class="align-middle" data-feather="shopping-bag"></i> 
                        <span class="align-middle">Pesanan</span>
                    </a>
                </li>

                {{-- <li class="sidebar-item {{ Request::is('pesanan/create*') ? 'active' : '' }} {{ Request::is('pesanan/create') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/pesanan/create">
                        <i class="align-middle" data-feather="shopping-bag"></i> 
                        <span class="align-middle">Buat Pesan</span>
                    </a>
                </li> --}}


                {{-- <li class="sidebar-item {{ Request::is('pesananSaya/history') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/pesananSaya/history">
                        <i class="align-middle" data-feather="activity"></i> 
                        <span class="align-middle">History Pesanan</span>
                    </a>
                </li> --}}

            @endcan
            

            <li class="sidebar-header">
                Laporan
            </li>

            {{-- @can('karyawan')
                
            <li class="sidebar-item {{ Request::is('laporanSaya') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/laporanSaya">
                    <i class="align-middle" data-feather="file-text"></i>
                    <span class="align-middle">Laporan Saya</span>
                </a>
            </li>

            @endcan --}}

            @cannot('pelanggan')
            <li class="sidebar-item {{ Request::is('laporanPelanggan') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/laporanPelanggan">
                    <i class="align-middle" data-feather="file-text"></i>
                    <span class="align-middle">Laporan Pelanggan</span>
                </a>
            </li>
            @endcannot
            
            {{-- @can('mustBeAdmin')

            <li class="sidebar-item {{ Request::is('laporanKaryawan') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/laporanKaryawan">
                    <i class="align-middle" data-feather="file-text"></i>
                    <span class="align-middle">Laporan Karyawan</span>
                </a>
            </li>
                
            @endcan --}}
            
            @can('pelanggan')
                
                <li class="sidebar-item {{ Request::is('LaporanSaya') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/LaporanSaya">
                        <i class="align-middle" data-feather="book"></i> 
                        <span class="align-middle">Laporan</span>
                    </a>
                </li>
                
                {{-- <li class="sidebar-item {{ Request::is('Laporan/History') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Laporan/History">
                        <i class="align-middle" data-feather="activity"></i> 
                        <span class="align-middle">History Laporan</span>
                    </a>
                </li> --}}
            
            @endcan

            @can('karyawan')

                <li class="sidebar-header">
                    Rekap
                </li>
                
                <li class="sidebar-item {{ Request::is('Rekap/RPesanan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Rekap/RPesanan">
                        <i class="align-middle" data-feather="clipboard"></i> 
                        <span class="align-middle">Rekap Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('Rekap/RTransaksi*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Rekap/RTransaksi">
                        <i class="align-middle" data-feather="clipboard"></i> 
                        <span class="align-middle">Rekap Transaksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('Rekap/RPelanggan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Rekap/RPelanggan">
                        <i class="align-middle" data-feather="clipboard"></i> 
                        <span class="align-middle">Rekap Data Pelanggan</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('Rekap/RLaporanPelanggan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Rekap/RLaporanPelanggan">
                        <i class="align-middle" data-feather="clipboard"></i> 
                        <span class="align-middle">Rekap laporan pelanggan</span>
                    </a>
                </li>
            @endcan

            <li class="sidebar-header">
                Lainnya
            </li>

            @if ($baNotif == 0)
                
                <li class="sidebar-item {{ Request::is('notif*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="/notif">
                        <i class="align-middle" data-feather="bell"></i>
                        <span class="align-middle">Notifikasi</span>
                    </a>
                </li>

            @else
                
            <li class="sidebar-item {{ Request::is('notif*') ? 'active' : '' }}">
                <a class="sidebar-link text-white" href="/notif">
                    <i class="align-middle text-white" data-feather="bell"></i>
                    <span class="indicator">{{ $baNotif }}</span>
                    <span class="align-middle">Notifikasi Baru</span>
                </a>
            </li>
            @endif
            
                
            @if ($baMessage != 0)
                <li class="sidebar-item {{ Request::is('message*') ? 'active' : '' }}">
                    <a class="sidebar-link text-white" href="/message">
                        <i class="align-middle text-white" data-feather="message-square"></i>
                        <span class="indicator">{{ $baMessage }}</span>
                        <span class="align-middle">Pesan Baru</span>
                    </a>
                </li>
            @else

            <li class="sidebar-item {{ Request::is('message*') ? 'active' : '' }}">
                <a class="sidebar-link" href="/message">
                    <i class="align-middle" data-feather="message-square"></i>
                    <span class="align-middle">Pesan</span>
                </a>
            </li>

            @endif

        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Check Account</strong>
                <div class="mb-3 text-sm">
                    Sebelum bisa memesan, diharapkan pelanggan dapat mengisi data diri terlebih dahulu
                </div>
                <div class="d-grid">
                    <a href="/profile" class="btn btn-primary">Profile</a>
                </div>
            </div>
        </div>
    </div>
</nav>