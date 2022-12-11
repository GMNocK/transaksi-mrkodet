@extends('myDashboard.App')

@section('content')
    
    <div class="col-12">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <div class="link-secondary fw-semibold fs-5 ms-1">
                            <i class="fa fa-bell me-1 ms-1 fs-4" aria-hidden="true"></i>
                            {{-- <span class="align-middle mb-1 me-1" data-feather="bell"></span> --}}
                            <span class="fs-4">Semua Notifikasi</span>
                        </div>
                    </div>
                </div>
                @if ($notifikasi != '[]')
                    <div class="row mt-3 pt-3">
                        <div class="col-12">
                            <a href="/delete/notif" class="btn btn-danger shadow-lg">
                                <i class="fa fa-trash me-1" aria-hidden="true"></i>
                                Hapus Notifikasi Dibaca
                            </a>
                            <a href="/read/notif" class="btn btn-primary mx-2 shadow-lg">
                                <i class="fas fa-book-reader me-1"></i>
                                Tandai Semua Dibaca
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-body">
                    @if ($notifikasi != '[]')

                            @foreach ($notifikasi as $n)
                                {{-- <tr>
                                    <td scope="row" class="py-4"
                                        
                                    > --}}
                                    <a href="/notif/{{ $n->id }}" class="list-group-item">
                                        <div class="p-4 {{ $n->notifRead != '[]' ? 'bg-light' : '' }}"
                                            @if ($n->notifRead == '[]')
                                                style="background: rgba(18, 214, 44, .2);"                                    
                                            @endif
                                            >
                                            <div class="row g-0 align-items-center">
                                                <div class="col-12">
                                                    <h3 class="text-dark fw-semibold">{{ $n->title }}</h3>
                                                    <div class="text-muted mt-1" style="font-size: 16px">{{ $n->detail }}</div>
                                                    <div class="text-muted small mt-2">{{ $n->created_at }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                            @endforeach

                    @else
                        <div class="row">
                            <div class="col-12 text-center">
                                <p class="btn btn-light" style="letter-spacing: .03em; box-shadow: 2px 2px 12px -2px rgba(29, 28, 28, .3)">Tidak Ada Notifikasi</p>
                            </div>
                        </div>
                    @endif
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