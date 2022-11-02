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
                    
                    <form action="/resetPassword/action" method="POST">
                        @csrf
                        <div class="col-xs-1-12">
                            <div class="card p-3 bg-light rounded-5">
                                <div class="card-body">
                                    <h3 class="card-title text-center mb-3">Reset Password</h3>
                                    <div class="card-text text-center mb-5"></div>
                                    <div class="card-text mx-3 mb-3" style="font-size: 15px">Hi, </div>
                                    <input type="email" name="email" class="form-control mb-3" placeholder="Your Email" value="{{ old('email') }}">
                                    <input type="password" name="newPassword" class="form-control mb-3" placeholder="New Password">
                                    <input type="password" name="confirmNewPassword" class="form-control mb-4" placeholder="Confirm New Password">
                                    <div class="col-12 m-0 p-0">
                                        <button class="btn btn-outline-primary btn-block">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>