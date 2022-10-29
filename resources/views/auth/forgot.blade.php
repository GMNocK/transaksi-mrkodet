<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                        <p><a href="#">Forgot password?</a></p>
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