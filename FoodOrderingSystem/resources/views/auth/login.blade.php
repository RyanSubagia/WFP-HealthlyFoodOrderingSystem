@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

<div class="auth-wrapper login">
    
    <div class="container auth-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <div class="auth-header login">
                        <h1>Welcome Back</h1>
                        <p>Sign in to continue your culinary adventure</p>
                    </div>
                    
                    <div class="auth-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-floating">
                                <input 
                                    id="email" 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email" 
                                    autofocus
                                    placeholder="name@example.com"
                                >
                                <label for="email">{{ __('Email Address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input 
                                    id="password" 
                                    type="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" 
                                    required 
                                    autocomplete="current-password"
                                    placeholder="Password"
                                >
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        

                            <div class="d-grid">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Sign In Now') }}
                                </button>
                            </div>
                            
                            <div class="auth-links">
    <a href="{{ route('register') }}">Don't have an account?</a>
    <a href="{{ route('passwords.reset') }}">{{ __('Forgot Password?') }}</a>
</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection