@extends('myDashboard.App')

@section('content')
    
<div class="col-md-12 col-lg-12 col-xxl-12 d-flex">
    <div class="card flex-fill">
        <div class="card-header justify-content-between d-flex align-content-center">
            <div class="ol-md-4 ms-3 mt-2 d-flex justify-content-end align-items-center">
                <h5 class="link-secondary card-title">
                    <span class="align-middle me-2" data-feather="message-square"></span>
                    Semua Pesan
                </h5>
            </div>
        </div>
        
        <div class="row justify-content-center">
            @foreach ($message as $i)
                
                <div class="col-11 my-3 bg-light" style="border-radius: 10px; padding: 15px 25px">
                    <div class="header">
                        {{-- <i class="fa fa-user-circle fs-4 me-2" aria-hidden="true"></i> --}}
                        <span class="fs-4">From : {{ $i->user->username }} ( {{ $i->user->level }} )</span>
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