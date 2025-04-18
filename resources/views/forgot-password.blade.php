@extends('frontend.layouts.layout')
@section('title', 'Logic Partners')
@section('login')
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form method="POST" action="{{ route('password.email') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Forgot your password?</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="email" placeholder="Email" name="email" value="{{ old('email')}}" />
                </div>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="flex items-center justify-end mt-4 gap-3">
                    <input type="submit" value="Reset Link" class="btn solid" />
                    <a href="{{route('home.index')}}">Back</a>
                </div>
            </form>

        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Forgot your password?</h3>
                <p>
                    Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                </p>
                {{-- <button class="btn transparent" id="sign-up-btn">
                    Sign up
                </button> --}}
            </div>
            <img  src="https://i.ibb.co/6HXL6q1/Privacy-policy-rafiki.png" class="image" alt="" />
        </div>
    </div>
</div>

@endsection
