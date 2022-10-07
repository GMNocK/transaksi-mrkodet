@extends('dashboard.layouts.main')

@section('container')
<form action="/dashboard/users/" method="POST">
    @csrf
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
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection