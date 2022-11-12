<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand d-flex align-items-center py-1" href="/myDashboard/">
            <div class="img navbar-brand py-2">
                <img src="{{ asset('img/logo.png') }}" alt="." width="40px" class="me-3 rounded">
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
            
            @cannot('pelanggan')
                
                <li class="sidebar-header">
                    Data
                </li>
                
                <li class="sidebar-item {{ Request::is('transaksi*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/transaksi">
                        <i class="align-middle" data-feather="book"></i> 
                        <span class="align-middle">Data Transaksi</span>
                    </a>
                </li>            
                <li class="sidebar-item {{ Request::is('pesanan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/pesanan">
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

            @endcannot
            
            @can('pelanggan')
                
            
                <li class="sidebar-header">
                    Pesanan
                </li>

                <li class="sidebar-item {{ Request::is('pesananSaya*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/pesananSaya">
                        <i class="align-middle" data-feather="shopping-bag"></i> 
                        <span class="align-middle">Pesan</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::is('myDashboard/pesanan/history') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/myDashboard/pesanan/history">
                        <i class="align-middle" data-feather="activity"></i> 
                        <span class="align-middle">History Pesanan</span>
                    </a>
                </li>

            @endcan
                  
            
            <li class="sidebar-header">
                Laporan
            </li>

            @cannot('pelanggan')                            

            <li class="sidebar-item {{ Request::is('laporanPelanggan') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/laporanPelanggan">
                    <i class="align-middle" data-feather="file-text"></i> 
                    <span class="align-middle">Laporan Pelanggan</span>
                </a>
            </li>

            @endcannot
            
            @can('pelanggan')
                
                <li class="sidebar-item {{ Request::is('LaporanSaya') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/LaporanSaya">
                        <i class="align-middle" data-feather="book"></i> 
                        <span class="align-middle">Laporan</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ Request::is('Laporan/History') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Laporan/History">
                        <i class="align-middle" data-feather="activity"></i> 
                        <span class="align-middle">History Laporan</span>
                    </a>
                </li>
            
            @endcan

            @cannot('pelanggan')
                
                <li class="sidebar-header">
                    Rekap
                </li>
                
                <li class="sidebar-item {{ Request::is('Rekap/pesanan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Rekap/pesanan">
                        <i class="align-middle" data-feather="clipboard"></i> 
                        <span class="align-middle">Rekap Pesanan</span>
                    </a>
                </li>
                
                <li class="sidebar-item {{ Request::is('Rekap/Transaksi*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Rekap/Transaksi">
                        <i class="align-middle" data-feather="clipboard"></i> 
                        <span class="align-middle">Rekap Transaksi</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('Rekap/laporanPelanggan*') ? 'active' : '' }}">
                    <a class="sidebar-link text-decoration-none" href="/Rekap/laporanPelanggan">
                        <i class="align-middle" data-feather="clipboard"></i> 
                        <span class="align-middle">Rekap laporan pelanggan</span>
                    </a>
                </li>
            @endcannot

            {{-- <li class="sidebar-header">
                Hmmmm
            </li>
            
            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-buttons.html">
                    <i class="align-middle" data-feather="square"></i> 
                    <span class="align-middle">Buttons</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-forms.html">
                    <i class="align-middle" data-feather="check-square"></i> 
                    <span class="align-middle">Forms</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-cards.html">
                    <i class="align-middle" data-feather="grid"></i> 
                    <span class="align-middle">Cards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="ui-typography.html">
                    <i class="align-middle" data-feather="align-left"></i> 
                    <span class="align-middle">Typography</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> 
                    <span class="align-middle">Icons</span>
                </a>
            </li>

            <li class="sidebar-header">
                Plugins & Addons
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> 
                    <span class="align-middle">Charts</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="maps-google.html">
                    <i class="align-middle" data-feather="map"></i> 
                    <span class="align-middle">Maps</span>
                </a>
            </li> --}}
        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Check Account</strong>
                <div class="mb-3 text-sm">
                    You not Have Finish Answer Your Identity
                </div>
                <div class="d-grid">
                    <a href="/dashboard/profile" class="btn btn-primary">Profile</a>
                </div>
            </div>
        </div>
    </div>
</nav>