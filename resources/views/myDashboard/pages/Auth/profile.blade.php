@extends('myDashboard.App')

@section('content')
    
<div class="row">

    <div class="col-xxl-8">
        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between px-5">
                <div class="d">
                    Hai, {{ auth()->user()->username }}
                </div>
                <div class="b">
                    Profile
                </div>
            </div>
            
        </div>
    </div>
</div>
<form action="/auth/Profile/update/{{ $data[0]->id }}" method="post">
@csrf

<div class="row">
    <div class="col-8">
        <div class="card flex-fill">
            <div class="card-header">
                Identitas Anda
            </div>
            <div class="p-3 fs-3 fw-semibold">
                <img src="{{ asset('img/avatars/index.png') }}" alt="" class="rounded-5 me-4" width="70px">
                {{ auth()->user()->username }}
            </div>
            <div class="my-4"></div>
            <div class="col-12">
                <div class="form-group">
                    <label for="NoTelpon" class="fs-4">No. Telepon</label>
                    <input type="text" name="no_tlp" id="NoTelpon" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group mb-2">
                    <label for="Alamat" class="fs-4">Alamat</label>
                    <textarea class="form-control" name="alamat" id="Alamat" rows="3"></textarea>
                </div>
                <div class="d-flex justify-content-end my-3">
                        <button id="btnsave" class="btn btn-primary my-2 text-white" role="button">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</form>
@endsection