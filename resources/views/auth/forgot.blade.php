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
                        <form action="forgotNext" method="post">
                            @csrf
                            <div class="col-xs-1-12">
                                <div class="card p-3 bg-light rounded-5">
                                    <div class="card-body">
                                        <h3 class="card-title text-center mb-5">Get Email</h3>
                                        <input type="email" name="email" class="form-control mb-4" placeholder="Your Email" value="{{ old('email') }}">
                                        <div class="col-12 m-0 p-0">
                                            <button class="btn btn-outline-primary btn-block">Next</button>
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