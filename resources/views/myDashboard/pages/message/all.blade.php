@extends('myDashboard.App')

@section('content')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header">
            <div class="row">
                <div class="col-12 ms-3 mt-2">
                    <h5 class="link-secondary card-title">
                        <span class="align-middle me-2" data-feather="message-square"></span>
                        Semua Pesan
                    </h5>
                </div>
            </div>
            @if ($message != '[]')                
                <div class="row mt-3 pt-3">
                    <div class="col-12">
                        <a href="/message/delete/readed" class="btn btn-danger shadow-lg">
                            <i class="fa fa-trash me-1" aria-hidden="true"></i>
                            Hapus Semua Pesan Dibaca
                        </a>
                        <a href="/read/message" class="btn btn-primary mx-2 shadow-lg">
                            <i class="fas fa-book-reader me-1"></i>
                            Tandai Semua Dibaca
                        </a>
                    </div>
                </div>
            @endif
            @if ($message == '[]')
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <span class="btn btn-light shadow-lg text-dark">Tidak Ada Pesan</span>
                    </div>
                </div>
            @endif
        </div>
        
        
        @if ($message != '[]')
            <div class="row justify-content-center">
                
                @foreach ($message as $i)
                    
                    <div class="col-11 my-2 {{ $i->notifRead == '[]' ? '' : 'bg-light' }}" 
                        @if ($i->notifRead == '[]')
                            style="background: rgba(18, 214, 44, .2); border-radius: 10px; padding: 15px 25px"                                    
                        @else
                            style="border-radius: 10px; padding: 15px 25px"                                    
                        @endif
                        >
                        <div class="header">
                            @if ($i->pengirim != '[]')                                
                            <span class="fs-4">From : {{ $i->pengirim[0]->user->username }} ( {{ $i->pengirim[0]->user->level }} )</span>
                            @else
                            {{-- <span class="fs-4">From : {{ $i->pengirim[0]->user->username }} ( {{ $i->pengirim[0]->user->level }} )</span> --}}
                            @endif
                            <div class="float-end">{{ $i->created_at }}</div>
                            <div class="mt-3 mb-2">
                                <h4>{{ $i->title }}</h4>
                            </div>
                        </div>
                        <div class="fs-7">
                            {{ $i->potongan }}
                        </div>
                        <div class="footer">
                            <form action="/message/{{ $i->id }}" method="POST">
                                @csrf
                                <a href="/message/{{ $i->id }}" class="text-primary fs-6 float-end me-3 mt-2 link-info border-0 bg-transparent">
                                    <span class="align-middle" data-feather="eye"></span>
                                    <span class="fs-4 align-middle">Detail</span>
                                </a>
                            </form>
                        </div>
                    </div>
            
                @endforeach

            </div>
        @endif
        <div class="d-flex justify-content-end col-12 mb-5">
            <span class="me-4">
                {{-- {{ $laporanpelanggans->links() }}             --}}
            </span>
        </div>
    </div>
</div>

@if (session('balasBerhasil'))
    <script>
        Swal.fire({
        icon: 'success',
        title: '{{ session("balasBerhasil") }}',
        showConfirmButton: false,
        timer: 1500
    })
    </script>
@endif

@endsection