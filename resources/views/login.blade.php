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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/ce.css">
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
</body>
</html>