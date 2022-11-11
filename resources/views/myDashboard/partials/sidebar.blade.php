<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand d-flex align-items-center py-1" href="/dashboard/">
            <img src="{{ asset('img/basrengpic.jpg') }}" alt="." width="30px" class="me-2 navbar-brand">
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
            
            <li class="sidebar-header">
                Pesanan
            </li>

            <li class="sidebar-item {{ Request::is('pelanggan/pesanan*') ? 'active' : '' }}">
                <a class="sidebar-link text-decoration-none" href="/pelanggan/pesanan">
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

            
            <li class="sidebar-header">
                Laporan
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link text-decoration-none" href="pages-sign-in.html">
                    <i class="align-middle" data-feather="book"></i> 
                    <span class="align-middle">Laporan</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link text-decoration-none" href="pages-sign-in.html">
                    <i class="align-middle" data-feather="activity"></i> 
                    <span class="align-middle">History Laporan</span>
                </a>
            </li>

            {{--
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