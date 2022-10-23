<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/transaksis*') ? 'active' : '' }}" href="/dashboard/transaksis/">
            <span data-feather="file" class="align-text-bottom"></span>
            Transaksi
          </a>
        </li>

        @can('mustBeAdmin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users/">
            <span data-feather="user" class="align-text-bottom"></span>
            Users
          </a>
        </li>
        @endcan
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
        <span>Reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle" class="align-text-bottom"></span>
        </a>
      </h6>

      <ul class="nav flex-column mb-2">
        
        @can('costumer')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('transaksi/reports*') ? 'active' : '' }}" href="/transaksi/reports">
            <span data-feather="file-text" class="align-text-bottom"></span>
            My Reports
          </a>
        </li>
        @endcan
        @can('karyawan')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('laporankaryawans*') ? 'active' : '' }}" href="/laporankaryawans">
            <span data-feather="file-text" class="align-text-bottom"></span>
            My Reports
          </a>
        </li>
        @endcan

        @can('mustBeAdmin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('laporan*') ? 'active' : '' }}" href="/laporankaryawans">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Today
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text" class="align-text-bottom"></span>
            This Month
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="file-text" class="align-text-bottom"></span>
            This Year
          </a>
        </li>
        @endcan

      </ul>
    </div>
  </nav>
