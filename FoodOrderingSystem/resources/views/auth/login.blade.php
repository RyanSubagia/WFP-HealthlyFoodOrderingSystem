@extends('layouts.app')

@section('content')
<style>
.auth-wrapper {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    position: relative;
    overflow: hidden;
}

.auth-wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-image: 
        radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 60%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.auth-container {
    position: relative;
    z-index: 1;
    padding: 2rem 0;
}

.auth-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 20px;
    box-shadow: 
        0 25px 50px rgba(0, 0, 0, 0.15),
        0 0 0 1px rgba(255, 255, 255, 0.1);
    border: none;
    overflow: hidden;
    transition: all 0.3s ease;
}

.auth-card:hover {
    transform: translateY(-5px);
    box-shadow: 
        0 35px 60px rgba(0, 0, 0, 0.2),
        0 0 0 1px rgba(255, 255, 255, 0.1);
}

.auth-header {
    background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%);
    color: white;
    padding: 2rem;
    text-align: center;
    position: relative;
    border: none;
}

.auth-header::before {
    content: '🍱';
    font-size: 3rem;
    display: block;
    margin-bottom: 1rem;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

.auth-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin: 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.auth-header p {
    margin: 0.5rem 0 0 0;
    opacity: 0.9;
    font-size: 1rem;
}

.auth-body {
    padding: 2.5rem;
}

.form-floating {
    margin-bottom: 1.5rem;
}

.form-floating .form-control {
    border: 2px solid #e1e5e9;
    border-radius: 12px;
    height: 60px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.8);
}

.form-floating .form-control:focus {
    border-color: #4ECDC4;
    box-shadow: 0 0 0 0.2rem rgba(78, 205, 196, 0.25);
    background: white;
    transform: translateY(-2px);
}

.form-floating label {
    color: #666;
    font-weight: 500;
    padding-left: 1rem;
}

.form-floating .form-control:focus~label,
.form-floating .form-control:not(:placeholder-shown)~label {
    color: #4ECDC4;
    transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
}

.btn-login {
    background: linear-gradient(135deg, #4ECDC4 0%, #44A08D 100%);
    border: none;
    border-radius: 12px;
    padding: 0.8rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    position: relative;
    overflow: hidden;
}

.btn-login::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: left 0.5s;
}

.btn-login:hover::before {
    left: 100%;
}

.btn-login:hover {
    background: linear-gradient(135deg, #26A69A 0%, #00695C 100%);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(78, 205, 196, 0.4);
}

.auth-links {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid #eee;
    flex-wrap: wrap;
    gap: 1rem;
}

.auth-links a {
    color: #4ECDC4;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    font-size: 0.9rem;
}

.auth-links a:hover {
    color: #26A69A;
    text-decoration: underline;
}

.remember-check {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 1rem;
}

.remember-check input[type="checkbox"] {
    width: 18px;
    height: 18px;
    border-radius: 4px;
    border: 2px solid #ddd;
    transition: all 0.3s ease;
}

.remember-check input[type="checkbox"]:checked {
    background-color: #4ECDC4;
    border-color: #4ECDC4;
}

.remember-check label {
    margin: 0;
    color: #666;
    font-weight: 500;
    cursor: pointer;
}

.invalid-feedback {
    font-size: 0.875rem;
    color: #dc3545;
    margin-top: 0.5rem;
    display: block;
}

.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
}

.floating-sushi {
    position: absolute;
    font-size: 2rem;
    opacity: 0.1;
    animation: floatSushi 8s infinite linear;
    color: white;
}

.floating-sushi:nth-child(1) {
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.floating-sushi:nth-child(2) {
    top: 20%;
    right: 10%;
    animation-delay: 2s;
}

.floating-sushi:nth-child(3) {
    bottom: 20%;
    left: 15%;
    animation-delay: 4s;
}

.floating-sushi:nth-child(4) {
    bottom: 10%;
    right: 20%;
    animation-delay: 6s;
}

@keyframes floatSushi {
    0% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
    100% { transform: translateY(0px) rotate(360deg); }
}

@media (max-width: 768px) {
    .auth-card {
        margin: 1rem;
        border-radius: 15px;
    }
    
    .auth-header {
        padding: 1.5rem;
    }
    
    .auth-body {
        padding: 2rem 1.5rem;
    }
    
    .auth-header h1 {
        font-size: 1.5rem;
    }
    
    .auth-links {
        flex-direction: column;
        text-align: center;
    }
}
</style>

<div class="auth-wrapper">
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
                    <div class="auth-header">
                        <h1>Selamat Datang Kembali</h1>
                        <p>Masuk untuk melanjutkan petualangan rasa</p>
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
                                <label for="email">{{ __('Alamat Email') }}</label>
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

                            <div class="remember-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="remember" 
                                    id="remember" 
                                    {{ old('remember') ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="remember">
                                    {{ __('Ingat Saya') }}
                                </label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-login">
                                    {{ __('Masuk Sekarang') }}
                                </button>
                            </div>
                            
                            <div class="auth-links">
                                <a href="{{ route('register') }}">Belum punya akun?</a>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection