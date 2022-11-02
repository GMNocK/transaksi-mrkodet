<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- BootStrap CSS --}}
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">

    <title>Forgot Password</title>
    
</head>
<body>
    
<div class="container" style="height: 100vh">
    <div class="row h-100 ">
        <div class="col-12 d-flex justify-content-center">
            <div class="col-6 d-flex align-items-center">
                <div class="col-12 bg-white p-2">
                    <form action="/forgotLast" method="POST">
                        @csrf
                        <div class="col-xs-1-12">
                            <div class="card p-3 bg-light rounded-5">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-3">Get last password</h3>
                                    <div class="card-text text-center mb-5">Try To Remember Your Last Password</div>
                                    <div class="card-text mx-3 mb-3" style="font-size: 15px">Hi, {{ $email }}</div>
                                    <input type="password" name="password" class="form-control mb-3" placeholder="Your Last Password" value="{{ old('password') }}">
                                    <input type="password" name="passwordSame" class="form-control mb-4" placeholder="Confirm last Password" value="{{ old('passwordConfirm') }}">
                                    <div class="col-12 m-0 p-0">
                                        <button class="btn btn-outline-primary btn-block">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="email" value="{{ $email }}" hidden>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>