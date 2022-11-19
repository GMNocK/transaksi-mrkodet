@extends('myDashboard.App')

@section('content')
    
    <div class="col-5">

        <div class="form-group">
            <label for="">Filter Berdasarkan</label>
            <select class="custom-select border-0 bg-transparent" name="ok" id="filter">
                <option selected>Semua</option>
                <option value="1">Belum Di Baca</option>
                <option value="2">Di baca</option>
                <option value="6">Selesai</option>
                <option value="0">Dibatalkan</option>
            </select>
        </div>

    </div>

    <h1 id="result">Hasil</h1>

<script src="{{ asset('js/ajax/coba.js') }}"></script>

@endsection