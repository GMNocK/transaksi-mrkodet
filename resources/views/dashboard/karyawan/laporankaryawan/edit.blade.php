@extends('dashboard.layouts.main')

@section('container')
    
    <h2>Edit Laporan</h2>
        
    <div class="col-lg-6">
        <form action="/laporankaryawans/{{ $laporankaryawan->id }}" method="POST">            
            @method('put')
            @csrf
            <label for="title" class="form-label">Laporan Harian {{ date('Y-m-d') }}</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $laporankaryawan->title) }}">
            
            <label for="floatingTextarea2" class="form-label">Isi laporan</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" name="body"></textarea>
            

            <input type="submit" value="Laporr" class="btn btn-outline-success my-3">

            {{-- <input type="hidden" name="karyawan_id" value="{{ $ik }}">  --}}
        </form>
    </div>

@endsection