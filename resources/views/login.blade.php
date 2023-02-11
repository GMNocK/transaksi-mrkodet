{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login || Mr Kodet</title>
        <link rel="stylesheet" href="css/ce.css" />
    </head>
    <body>
        <h2 style="margin-bottom: 20px;">{!! session('success') !!}</h2>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="/register" method="POST">
                    @csrf
                    <h1>Create Account</h1>
                    <div class="social-container">
                        <a href="#" class="social"
                            ><i class="fab fa-facebook-f"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-google-plus-g"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-linkedin-in"></i
                        ></a>
                    </div>
                    <span>or use your email for registration</span>
                    <input type="text" name="nama" placeholder="nama" required value="{{ old('nama') }}"/>
                    <input type="text" name="username" placeholder="Username" required value="{{ old('username') }}" />
                    <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}" />
                    <input type="password" name="password" placeholder="Password" required />
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="/login" method="POST">
                    @csrf
                    <h1>Sign in</h1>
                    <div class="social-container">
                        <a href="#" class="social"
                            ><i class="fab fa-facebook-f"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-google-plus-g"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-linkedin-in"></i
                        ></a>
                    </div>
                    <span>or use your account</span>
                    <input type="email" name="email" placeholder="Email" required
                    />
                    <input type="password" name="password" placeholder="Password" required />
                    <a href="#">Forgot your password?</a>
                    <button>Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>
                            To keep connected with us please login with your
                            personal info
                        </p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>
                            Enter your personal details and start journey with
                            us
                        </p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="js/main.js"></script>
    </body>
</html> --}}



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/ce.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Login</title>
</head>
<body>
    <section>
        <div class="imgBx">
            <img src="img/basrengpic.jpg" alt="Basreng">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Login</h2>
                <form action="/login" method="POST">
                    @csrf
                    <div class="inputBx">
                        <span>Email Address</span>
                        <input type="text" name="email" placeholder="Your email" value="{{ old('email') }}" required>
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="forgot">
                        <p><a href="/forgot">Forgot password?</a></p>
                    </div>
                    <div class="inputBx">                        
                        <input type="submit" value="Sign in">
                    </div>
                    <div class="inputBx">   
                        <p>Don't have an account? <a href="/register">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @if (session('success'))
        
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1800
        })
    </script>
    @endif

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">	
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Login - Mister Kodet</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .background {
            height: 100vh;
            width: 100%;
        }
        body {
            font-family: sans-serif;
            background: #f1f0f0;
            color: rgb(19, 18, 18);
        }
        .login-box {
            position: absolute;
            background: #fff;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 40px 48px;
            box-shadow: 6px 7px 26px -1.5px rgba(44, 43, 43, 0.17);
            border-radius: 12px;
            font-size: 18px;
        }
        .login-box h1 {
            font-size: 36px;
            margin-bottom: 48px;
            text-align: center;
            color: rgb(49, 46, 46);
        }
        form {
            width: 360px;
        }
        .text {
            margin: 14px 0;
            font-size: 18px;
            overflow: hidden;
        }
        .text input {
            width: 100%;
            height: 6vh;
            margin: 4px 0;
            border: 1px solid rgb(165, 163, 163);
            border-radius: 5px;
            padding: 5px;
            outline: #881;
            font-size: 18px;
        }
        button#btn {
            width: 100%;
            margin-top: 20px;
            padding: 9px;
            background: rgb(255, 0, 0);
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: .3s;
            box-shadow: 5px 4px 42px -12px #333;
        }
        #btn:hover {
            box-shadow: 5px 4px 42px -12px #331222;
            background: rgb(111, 111, 112);
            transition: .3s;
        }
        .login-box h6 {
            margin-top: 32px;
            text-align: center;
        }
        .login-box #create {
            font-size: 14px;
            text-decoration: none;
            color: rgb(15, 85, 177);
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="login-box">
            <h1>
                Login
            </h1>
            <form action="/login" method="post">
                @csrf
                <div class="text">
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Email Anda">
                </div>
                <div class="text">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password Anda">
                </div>
                <button type="submit" id="btn">Login</button>
            </form>
            <h6>
                <a href="/register" id="create">
                    Buat Akun?
                </a>
            </h6>
        </div>
    </div>
</body>
</html>