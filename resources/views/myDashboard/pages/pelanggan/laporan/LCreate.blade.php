@extends('myDashboard.App')

@section('content')
    
<form action="/Laporan" method="POST">
  @csrf
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
    <input type="submit" class="btn btn-primary btn-block my-4" value="Kirim">
</form>

@endsection