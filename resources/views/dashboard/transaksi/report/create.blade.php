@extends('dashboard.layouts.main')

@section('container')
<form action="/transaksi/reports/" method="POST">
    @csrf

    <form action="/transaksi/reports/" method="POST">
      <!-- Name input -->
      <div class="form-outline col-10 my-4">
        <label class="form-label" for="form4Example1">Title \ Judul</label>
        <input type="text" id="form4Example1" class="form-control" name="title" />
      </div>
            
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="body"></textarea>
        <label for="floatingTextarea2">Isi laporan</label>
      </div>      

    @foreach ($pelanggans as $i)        
    <input type="hidden" value="{{ $i->id }}" name="pelanggan_id">
    @endforeach
    
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block my-4">
        Send
      </button>
      
{{-- 
      <div class="my-3 col-8">
        <label for="nama" class="form-label">nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
      </div>

      <div class="my-3 col-8">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username">
      </div>

      <div class="my-3 col-8">
        <label for="Email1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="Email1" aria-describedby="emailHelp" name="email">      
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      
      <div class="my-3 col-8">
        <label for="Password1" class="form-label">Password</label>
        <input type="password" class="form-control" id="Password1" name="password">
      </div> --}}
    
  </form>

@endsection


