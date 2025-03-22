@extends('frontend.layouts.layout')
@section('title', 'Logic Partners')
@section('login')
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Email" name="email" value="{{ old('email')}}" />
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" value="{{ old('password')}}" />
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <!-- Remember Me -->
                <div class="block mt-5">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!---------forgot password------------>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}
                    </a>
                    @endif
                    <input type="submit" value="Login" class="btn solid" />
                </div>

                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>

            <!--------------------Sign up form------------------>

            <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Name" name="name" value="{{ old('name')}}" />
                </div>
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email" value="{{ old('email')}}" />
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" value="{{ old('password')}}" />
                </div>
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation')}}" />
                </div>
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="flex items-center justify-end mt-4">
                    {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a> --}}
                    <input type="submit" class="btn" value="Sign up" />
                </div>

                <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                    ex ratione. Aliquid!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                    Sign up
                </button>
            </div>
            <img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                    laboriosam ad deleniti.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src="https://i.ibb.co/nP8H853/Mobile-login-rafiki.png"  class="image" alt="" />
        </div>
    </div>
</div>

@endsection
