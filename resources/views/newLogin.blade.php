<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">

    <style>
        body {
            background: #f1f1f1;
        }
    </style>

    <title>Login Baru</title>
</head>
<body>
    <div class="container-fluid" style="height: 100vh">
        <div class="row justify-content-center h-100">
            <div class="col-6 d-flex justify-content-center align-items-center">
                <div class="col-10 bg-white shadow-lg d-flex justify-content-center" style="border-radius: 15px">
                    <div class="col-10 py-5">
                        <form action="/login" method="post">
                            @csrf
                            <h2 class="text-dark text-center mb-5 fw-bold pb-3">Login</h2>
                            <div class="form-group">
                                <label for="">Email Anda</label>
                                <input type="email" class="form-control {{ session('failed') ? 'is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>                                    
                                @enderror
                            </div>
                            <div class="form-group my-3 py-2">
                                <label for="">Password Anda</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                @error('password')
                                    {{-- <span class="invalid-feedback">{{ $message }}</span> --}}
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>