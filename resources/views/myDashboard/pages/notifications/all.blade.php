@extends('myDashboard.App')

@section('content')
    
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="row justify-content-center">
                    <div class="col-6 text-center">
                        <div class="link-secondary fw-semibold fs-5 ms-1">
                            <i class="fa fa-bell me-1 ms-1 fs-4" aria-hidden="true"></i>
                            {{-- <span class="align-middle mb-1 me-1" data-feather="bell"></span> --}}
                            <span class="fs-4">Semua Notifikasi</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-inverse table-responsive">
                    <tbody>
                        @foreach ($Notif as $n)
                        <tr>
                            <td scope="row" class="py-4"
                                @if ($n->notifRead == '[]')
                                style="background: rgba(18, 214, 44, .2);"                                    
                                @endif
                            >
                                <a href="/notif/{{ $n->id }}" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-12">
                                            <h3 class="text-dark fw-semibold">{{ $n->user->pelanggan[0]->nama }}</h3>
                                            <div class="text-muted mt-1" style="font-size: 16px">{{ $n->detail }}</div>
                                            <div class="text-muted small mt-2">{{ $n->created_at }}</div>
                                        </div>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    @if (session('notif'))
        
    <script>
        Swal.fire({
            icon: 'success',
            title: '{{ session("notif") }}',
            showConfirmButton: false,
            timer: 1600
        })
    </script>

    @endif
    
@endsection