@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-90">
    <div class="card shadow-lg rounded-4 p-2" style="max-width: 400px; width: 100%;">
        <div class="card-body">
            <h4 class="text-center text-primary fw-bold mb-2">Login</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ url('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" required placeholder="Enter email">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" required placeholder="Enter password">
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg fw-semibold">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </div>

                <!-- <div class="text-center mt-3">
                    <a href="{{ url('password/reset') }}" class="text-decoration-none">Forgot Password?</a>
                </div> -->

                <p class="text-center mt-3">
                    Don't have an account? <a href="{{ url('register') }}" class="text-decoration-none fw-semibold">Register</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
