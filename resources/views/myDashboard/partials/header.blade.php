<nav class="navbar navbar-expand navbar-light navbar-bg" id="topContent">
    
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="bell"></i>
                            
                        @if ($baNotif != 0)
                            <span class="indicator">{{ $baNotif }}</span>
                        @endif

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                    <div class="dropdown-menu-header">
                        @if ($baNotif == 0)
                            Tidak Ada Notifikasi Baru
                        @else                            
                            {{ $baNotif }} Notifikasi Baru
                        @endif
                    </div>
                    <div class="list-group" id="notif">
                        @foreach ($Notif as $n)
                            <a href="/notif/{{ $n->id }}" class="list-group-item {{ $n->notifRead == '[]' ? 'unread' : '' }}" 
                                @if ($n->notifRead == '[]')
                                    style="background: rgba(18, 214, 44, .2);"
                                @endif
                                >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        {{-- <i class="text-danger" data-feather="alert-circle"></i> --}}
                                        <i class="text-primary" data-feather="shopping-bag"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">{{ $n->title }}</div>
                                        <div class="text-muted small mt-1">{{ $n->potongan }}</div>
                                        <div class="text-muted small mt-1">{{ $n->created_at->format('Y-M-d') }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="/notif" class="text-muted">Show all notifications</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="message-square"></i>
                        @if ($baMessage != 0)
                            <span class="indicator">{{ $baMessage }}</span>
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            @if ($baMessage == 0)
                                Tidak Ada Pesan Baru
                            @else
                                {{ $baMessage }} Pesan Baru
                            @endif
                        </div>
                    </div>
                    <div class="list-group">
                        @foreach ($message as $m)
                            <a href="/message/{{ $m->id }}" class="list-group-item {{ $m->notifRead == '[]' ? 'unread' : '' }}" 
                                @if ($m->notifRead == '[]')
                                    style="background: rgba(18, 214, 44, .2);"
                                @endif
                                >
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <img src="/img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                    </div>
                                    <div class="col-10 ps-2">
                                        <div class="text-dark">{{ $m->user->username }}</div>
                                        <div class="text-muted small mt-1">{{ $m->potongan }}</div>
                                        <div class="text-muted small mt-1">{{ $m->created_at }}</div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="/message" class="text-muted">Show all messages</a>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('img/avatars/index.png') }}" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> 
                    {{-- <i class="align-middle" data-feather="user"></i> --}}
                    <span class="text-dark">{{ auth()->user()->username }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="/profile">
                        <i class="align-middle me-1" data-feather="user"></i>
                            Profile
                    </a>
                    <a class="dropdown-item" href="/myDashboard">
                        <i class="align-middle me-1" data-feather="pie-chart"></i> 
                            Analytics
                    </a>
                    {{-- <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                        <i class="align-middle me-1" data-feather="settings"></i>
                            Settings & Privacy
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="align-middle me-1" data-feather="help-circle"></i>
                            Help Center
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <form action="/logout" class="text-dark" method="POST">
                        @csrf
                        <button class="dropdown-item">
                            <i class="align-middle me-1" data-feather="log-out"></i>
                            Log out
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>

</nav>