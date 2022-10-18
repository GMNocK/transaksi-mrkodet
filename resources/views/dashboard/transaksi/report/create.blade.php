@extends('dashboard.layouts.main')

@section('container')
<form action="/transaksis/report/" method="POST">
    @csrf

    <form action="{{ route('report.store') }}" method="POST">
      <!-- Name input -->
      <div class="form-outline col-10 my-4">
        <label class="form-label" for="form4Example1">Name</label>
        <input type="text" id="form4Example1" class="form-control" />
      </div>

      
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="email" id="form4Example2" class="form-control" />
        <label class="form-label" for="form4Example2">Email address</label>
      </div>
      
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Comments</label>
      </div>      
    
      <!-- Checkbox -->
      <div class="form-check mb-4">
        <input class="form-check-input me-2" type="checkbox" value="" id="form4Example4" checked />
        <label class="form-check-label" for="form4Example4">
          Send me a copy of this message
        </label>
      </div>
    <input type="hidden" value="{{ auth()->user()->id }}" name="hidden">
    <input type="hidden" value="{{ $pelanggans }}" name="hidden">

    
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block mb-4">
        Send
      </button>
      

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
      </div>
    
  </form>

@endsection


