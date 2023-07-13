<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('native/css/login.css') }}">
  <title>Login & Registration Form</title>
  <!---Custom CSS File--->
  <style>
    body {
    min-height: 100vh;
    width: 100%;
    background-image: url("{{ asset('assets/image/bg3.jpg') }}");
    background-repeat: no-repeat;
    background-size: cover;
}
  </style>
  
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form method="POST" action="{{ route('login') }}">
        @csrf
        {{-- <input type="text" placeholder="Enter your email"> --}}
        <input id="email" type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror

        {{-- Password Form --}}
        {{-- <input type="password" placeholder="Enter your password"> --}}
        <input id="password" type="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <strong>{{ $message }}</strong>
                </span>
            @enderror

        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
        {{-- <input type="button" class="button" value="Login"> --}}
        <input type="submit" class="button" value="Login">
            {{-- {{ __('Login') }} --}}
        </input>
        
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check">Register</label>
        </span>
      </div>
    </div>
    <div class="registration form">
      <header>Register</header>
      <form method="POST" action="{{ route('register') }}">
        @csrf
        {{-- <input type="text" placeholder="Enter your email"> --}}
        <input id="name" type="text" placeholder="Nama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
        {{-- <input type="password" placeholder="Create a password"> --}}
        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        {{-- <input type="password" placeholder="Confirm your password"> --}}
        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

        <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    {{-- <input type="button" class="button" value="Signup"> --}}
                                    <input type="submit" class="button" value="Register">
                                        
                                    </input>
    </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
</body>
</html>