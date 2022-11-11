@extends('dashboard.layouts.main')

@section('container')
    
    <div class="container">
        <div class="row justify-content-center">
        @foreach ($laporanpelanggans as $i)
            
            <div class="col-10 my-3 bg-light" style="border-radius: 10px; padding: 15px 25px">
                <div class="header">
                    <i class="fa fa-user-circle fs-4 me-2" aria-hidden="true"></i>
                    <span class="fs-4">{{ $i->pelanggan->nama }}</span>
                    <div class="float-end">{{ $i->send_at }}</div>
                    <div class="mt-3 mb-2">
                        <h5>{{ $i->title }}</h5>
                    </div>
                </div>
                <div class="fs-7">
                    {{ $i->body }}
                </div>
                <div class="footer">
                    <form action="/karyawan/laporanuser/reply/{{ $i->id }}" method="POST">
                        @csrf
                        <button class="text-primary fs-6 float-end me-3 mt-2 link-info border-0" style="background: none;">Reply</button>
                    </form>
                </div>
            </div>

        @endforeach

        </div>
    </div>

    <div class="d-flex justify-content-end col-11">
        {{ $laporanpelanggans->links() }}
    </div>

@endsection