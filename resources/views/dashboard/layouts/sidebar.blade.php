{{-- <style>
  .hide {
    transition: all .3s;
  }
  .show {
    transition: all .3s;
  }
</style> --}}

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
   <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">

        <li class="nav-item">
			<a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
				<i class="fa fa-sliders me-2" aria-hidden="true"></i>
				Dashboard
			</a>
        </li>
        <li class="nav-item">
			<a class="nav-link {{ Request::is('myDashboard') ? 'active' : '' }}" aria-current="page" href="/myDashboard">
				<i class="fa fa-sliders me-2" aria-hidden="true"></i>
				Dashboard Baru
			</a>
        </li>

		@cannot('pelanggan')
        <li class="nav-item">
			<a class="nav-link {{ Request::is('dashboard/transaksis*') ? 'active' : '' }}" href="/dashboard/transaksis/">
				<i class="fa-solid fa-grid"></i>	
				Transaksi
			</a>
        </li>
		@endcannot
		
		@can('pelanggan')
			<li class="nav-item">
				<a class="nav-link {{ Request::is('dashboard/pesan*') ? 'active' : '' }}" href="/dashboard/pesan">
					<i class="fas fa-id-card-alt me-2"></i>
					Pesanan
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link {{ Request::is('dashboard/pesanan/history*') ? 'active' : '' }}" href="/dashboard/pesan">
					<i class="fa fa-cart-plus" aria-hidden="true"></i>
					History
				</a>
			</li>
		@endcan

		@cannot('pelanggan')			
			<li class="nav-item">
				<a class="nav-link {{ Request::is('dashboard/dataPelanggan*') ? 'active' : '' }}" href="/dashboard/dataPelanggan/">
					<i class="fa fa-file-text me-2" aria-hidden="true"></i>
					Data Pelanggan
				</a>
			</li>
		@endcannot

        @can('mustBeAdmin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }}" href="/dashboard/users/">
            <i class="fa fa-user" aria-hidden="true"></i>
            Users
          </a>
        </li>
        @endcan

      </ul>

		<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
			<span class="fs-5">Reports</span>
			<a class="link-secondary" href="#" aria-label="Add a new report">
				<box-icon name="rocket" class="align-text-bottom"></box-icon>
			</a>
		</h6>

		<ul class="nav flex-column mb-2">
			
				@can('pelanggan')
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
							<i class="fas fa-file-invoice me-2"></i>
							My Reports
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link {{ Request::is('karyawan/laporanuser*') ? 'active' : '' }}" href="/karyawan/laporanuser">
							<i class="fas fa-file-invoice me-2"></i>
							User Reports
						</a>
					</li>
				@endcan

				@can('mustBeAdmin')
					<li class="nav-item" id="lkdToggle">
						<a class="nav-link {{ Request::is('admin/laporan/karyawan*') ? 'active' : '' }}" style="cursor: pointer">
						<span data-feather="file-text" class="align-text-bottom"></span>
						Laporan Karyawan
						</a>
					</li>

					<div id="laporanKaryawanDropdown" class="ms-3 {{ Request::is('admin/laporan/karyawan*') ? 'active' : 'hide' }}">
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/karyawan') ? 'active' : '' }}" href="/admin/laporan/karyawan">
								<span data-feather="file-text" class="align-text-bottom"></span>
								All
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/karyawan/today') ? 'active' : '' }}" href="/admin/laporan/karyawan/today">
								<span data-feather="file-text" class="align-text-bottom"></span>
								Today
							</a>
						</li>
		
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/karyawan/thisMonth') ? 'active' : '' }}" href="/admin/laporan/karyawan/thisMonth">
								<span data-feather="file-text" class="align-text-bottom"></span>
								This Month
							</a>
						</li>
		
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/karyawan/thisYear') ? 'active' : '' }}" href="/admin/laporan/karyawan/thisYear">
								<span data-feather="file-text" class="align-text-bottom"></span>
								This Year
							</a>
						</li>
					</div>
				@endcan

				@can('mustBeAdmin')
					<li class="nav-item" id="lpdToggle">
						<a class="nav-link {{ Request::is('admin/laporan/pelanggan*') ? 'active' : '' }}" style="cursor: pointer">
						<span data-feather="file-text" class="align-text-bottom"></span>
						Laporan Pelanggan
						</a>
					</li>

					<div id="laporanPelangganDropdown" class="ms-3 {{ Request::is('admin/laporan/pelanggan*') ? 'active' : 'hide' }}">
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/pelanggan') ? 'active' : '' }}" href="/admin/laporan/pelanggan">
								<span data-feather="file-text" class="align-text-bottom"></span>
								All
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/pelanggan/today') ? 'active' : '' }}" href="/admin/laporan/pelanggan/today">
								<span data-feather="file-text" class="align-text-bottom"></span>
								Today
							</a>
						</li>
		
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/pelanggan/thisMonth') ? 'active' : '' }}" href="/admin/laporan/pelanggan/thisMonth">
								<span data-feather="file-text" class="align-text-bottom"></span>
								This Month
							</a>
						</li>
		
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/laporan/pelanggan/thisYear') ? 'active' : '' }}" href="/admin/laporan/pelanggan/thisYear">
								<span data-feather="file-text" class="align-text-bottom"></span>
								This Year
							</a>
						</li>
					</div>
				@endcan

				@can('mustBeAdmin')				 
					<li class="nav-item mt-5">
						<div class="accordion accordion-flush	" id="accordionFlushExample">

							<div class="accordion-item bg-transparent nav-link p-0">
								<h2 class="accordion-header bg-transparent" id="flush-headingOne">
									<button class="accordion-button collapsed bg-transparent text-dark" style="font-size: 14px" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
										<span data-feather="file-text" class="me-2"></span>
										laporan Karyawan
									</button>
								</h2>
								<div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
									<div class="accordion-body px-3 py-2">
										<ul class="nav flex-column">
											<li class="nav-item">
												<a class="nav-link {{ Request::is('admin/laporan/karyawan') ? 'active' : '' }}" href="/admin/laporan/karyawan">
													<span data-feather="file-text" class="align-text-bottom"></span>
													All
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link {{ Request::is('admin/laporan/karyawan/today') ? 'active' : '' }}" href="/admin/laporan/karyawan/today">
													<span data-feather="file-text" class="align-text-bottom"></span>
													Today
												</a>
											</li>
							
											<li class="nav-item">
												<a class="nav-link {{ Request::is('admin/laporan/karyawan/thisMonth') ? 'active' : '' }}" href="/admin/laporan/karyawan/thisMonth">
													<span data-feather="file-text" class="align-text-bottom"></span>
													This Month
												</a>
											</li>
							
											<li class="nav-item">
												<a class="nav-link {{ Request::is('admin/laporan/karyawan/thisYear') ? 'active' : '' }}" href="/admin/laporan/karyawan/thisYear">
													<span data-feather="file-text" class="align-text-bottom"></span>
													This Year
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="accordion-item bg-transparent nav-link p-0">
							<h2 class="accordion-header bg-transparent" id="flush-headingTwo">
									<button class="accordion-button collapsed bg-transparent text-dark" style="font-size: 14px;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
										<span data-feather="file-text"></span>
										Laporan Pelanggan
									</button>
							</h2>
							<div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">
									<ul class="nav flex-column">
										<li class="nav-item">
											<a class="nav-link {{ Request::is('admin/laporan/pelanggan') ? 'active' : '' }}" href="/admin/laporan/pelanggan">
												<span data-feather="file-text" class="align-text-bottom"></span>
												All
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link {{ Request::is('admin/laporan/pelanggan/today') ? 'active' : '' }}" href="/admin/laporan/pelanggan/today">
												<span data-feather="file-text" class="align-text-bottom"></span>
												Today
											</a>
										</li>
						
										<li class="nav-item">
											<a class="nav-link {{ Request::is('admin/laporan/pelanggan/thisMonth') ? 'active' : '' }}" href="/admin/laporan/pelanggan/thisMonth">
												<span data-feather="file-text" class="align-text-bottom"></span>
												This Month
											</a>
										</li>
						
										<li class="nav-item">
											<a class="nav-link {{ Request::is('admin/laporan/pelanggan/thisYear') ? 'active' : '' }}" href="/admin/laporan/pelanggan/thisYear">
												<span data-feather="file-text" class="align-text-bottom"></span>
												This Year
											</a>
										</li>
									</ul>
								</div>
							</div>
							</div>

						</div>
					</li>
				@endcan

		</ul>
   </div>
</nav>



  <script>
    // const reportKMenu = document.querySelector('#laporanKaryawanDropdown');
    // const reportKToggle = document.querySelector('#lkdToggle');

    // const reportPMenu = document.querySelector('#laporanPelangganDropdown');
    // const reportPToggle = document.querySelector('#lpdToggle');

    // reportKToggle.addEventListener('click', function () { 
    //   // reportKMenu.classList.toggle('d-none');
    //   reportKMenu.classList.toggle('show');
    //   reportKMenu.classList.toggle('hide');
    // });

    // reportPToggle.addEventListener('click', function () { 
    //   // reportPMenu.classList.toggle('d-none');
    //   reportPMenu.classList.toggle('show');
    //   reportPMenu.classList.toggle('hide');
    // });

  </script>
