<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register / Login</title>
    <link rel="stylesheet" href="assets/css/login/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script defer src="assets/js/login/script.js"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">

            {{-- Form untuk Register --}}
            <form action="{{ route('register') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Username" name="name" id="name" required />
                <input type="email" placeholder="Email" name="email" id="email" required />
                <input type="password" placeholder="Password" name="password" id="password" required />
                <input type="password" placeholder="Confirm Password" name="password_confirmation" id="confirm-password" required />
                <div id="password-error" style="color: red; display: none;">Passwords do not match!</div>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">

            {{-- Form untuk LOGINNNNN --}}
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Masukkan Email anda (＊◕ᴗ◕＊)</span>
                <input type="email" placeholder="Email" name="email" id="email" required/>
                <input type="password" placeholder="Password" name="password" id="password" required />
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
