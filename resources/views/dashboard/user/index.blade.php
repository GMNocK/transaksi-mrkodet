@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Transaksi</h1>
</div>

<h2><a href="/dashboard/users/create" class="text-decoration-none text-center btn btn-primary"><span data-feather="user-plus"></span> Tambah Data</a></h2>
      <div class="table-responsive col-lg-11">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">level</th>
              <th scope="col" style="text-align: center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $s)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $s->username }}</td>
                <td>{{ $s->email }}</td>
                <td>{{ $s->level }}</td>
                <td style="text-align: center">
                    <a href="{{-- delete --}}"><span data-feather="x-circle" class="align-text-bottom text-danger" style="margin-right: 4px" ></span></a>
                    <a href="{{-- edit / update --}}"><span data-feather="edit" class="align-text-bottom text-danger" style="margin-right: 4px" ></span></a>                    
                </td>
            </tr>    
            @endforeach
            
          </tbody>
        </table>
      </div>
@endsection