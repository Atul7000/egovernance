@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-90">
    <div class="card shadow-lg rounded-4 p-2" style="max-width: 500px; width: 100%;">
        <div class="card-body">
            <h3 class="text-center mb-4 text-primary fw-bold">Student Registration</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ url('register') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" class="form-control" required placeholder="Enter full name">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" required placeholder="Enter email address">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" required placeholder="Enter password">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Confirm Password:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="Re-enter password">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Mobile No.:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-phone"></i></span>
                        <input type="text" name="mobile_no" class="form-control" required placeholder="Enter mobile number">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">PAN Card No.:</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                        <input type="text" name="pan_card_no" class="form-control" required placeholder="Enter PAN card number">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">ID Card (PDF):</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-file-earmark-pdf"></i></span>
                        <input type="file" name="id_card_path" class="form-control" accept="application/pdf" required>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg fw-semibold">
                        <i class="bi bi-pencil-square"></i> Register
                    </button>
                </div>

                <p class="text-center mt-3">
                    Already have an account? <a href="{{ url('login') }}" class="text-decoration-none fw-semibold">Login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
