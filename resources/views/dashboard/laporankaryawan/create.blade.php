@extends('dashboard.layouts.main')

@section('container')
    <h2>Tempat Buat laporan</h2>

    <form action="/laporankaryawans" method="POST">
        @csrf
        <input type="text" class="form-control" name="id">

        <input type="submit" value="Laporr" class="btn btn-danger">
    </form>
@endsection