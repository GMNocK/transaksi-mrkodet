{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/ce.css">
</head>
<body>
    @error('email')
        {{ $message }}
    @enderror
    <section>
        <div class="imgBx">
            <img src="img/basrengpic.jpg" alt="Basreng">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Register</h2>
                <form action="/register" method="POST">
                    @csrf
                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                    </div>
                    <div class="inputBx">
                        <span>Email Address</span>
                        <input type="email" name="email" placeholder="Your email" value="{{ old('email') }}" required>
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="inputBx">                        
                        <input type="submit" value="Sign up">
                    </div>
                    <div class="inputBx">   
                        <p>Have an account? <a href="/">Sign in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html> --}}


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

    <title>Register - Mr.Kodet</title>
</head>
<body>
    <form action="/register" method="post">
        @csrf
        <div class="container-fluid position-absolute" style="height: 100vh">
            <div class="row h-100">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="col-5 bg-white p-5 shadow" style="border-radius: 13px">
                        <h2 class="mb-5 text-center">
                            Isi Data Diri
                        </h2>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkan Email Aktif Anda">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Buat Password">
                        </div>
                        <input type="submit" value="Buat Akun" class="btn btn-primary btn-block mt-5 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>