@extends('dashboard.layouts.main')

@section('container')
    <h2>Tempat Buat laporan</h2>
    
    <div class="col-lg-6">
        <form action="/laporankaryawans" method="POST">            
            @csrf
            <label for="title" class="form-label">Laporan Harian {{ date('Y-m-d') }}</label>
            <input type="text" class="form-control" id="title" name="title">
            
            <label for="floatingTextarea2" class="form-label">Isi laporan</label>
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" name="body"></textarea>
             
    
            <input type="submit" value="Laporr" class="btn btn-outline-success">
    
            <input type="hidden" name="karyawan_id" value="{{ $ik }}"> 
        </form>
    </div>
@endsection