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
</html>