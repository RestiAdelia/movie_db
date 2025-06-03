@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-5 rounded-4 border-0" style="width: 100%; max-width: 420px;">
            <div class="text-center mb-4">
                <img src="https://img.icons8.com/fluency/48/000000/login-rounded-right.png" alt="login-icon" />
                <h3 class="fw-bold text-success mt-2">Login</h3>
            </div>

            {{-- Flash message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success w-100 fw-bold">Login</button>
            </form>

            {{-- <div class="text-center mt-3">
                <small>Belum punya akun? <a href="{{ url('/register') }}" class="text-success fw-bold">Daftar</a></small>
            </div> --}}
        </div>
    </div>
@endsection
