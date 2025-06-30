@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

<div class="auth-wrapper register">
    <div class="floating-elements">
        <div class="floating-sushi">🍣</div>
        <div class="floating-sushi">🍱</div>
        <div class="floating-sushi">🥢</div>
        <div class="floating-sushi">🍜</div>
    </div>
    
    <div class="container auth-container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <div class="auth-header register">
                        <h1>Welcome</h1>
                        <p>Register to enjoy the best sushi</p>
                    </div>
                    
                    <div class="auth-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-floating">
                                <input 
                                    id="name" 
                                    type="text" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name" 
                                    autofocus
                                    placeholder="Full Name"
                                >
                                <label for="name">{{ __('Full Name') }}</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input 
                                    id="email" 
                                    type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email"
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
                                    autocomplete="new-password"
                                    placeholder="Password"
                                >
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating">
                                <input 
                                    id="password-confirm" 
                                    type="password" 
                                    class="form-control" 
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password"
                                    placeholder="Confirm Password"
                                >
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-register">
                                    {{ __('Register Now') }}
                                </button>
                            </div>
                            
                            <div class="login-link">
                                <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection