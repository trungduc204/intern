@extends('layouts.au')
@section('title',__('Login Manager'))

@section('content')

<div class="login-container">
        <h4 class="text-center text-info">Login</h4>
        
        <form action="{{ route('login')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            <span class="input-group-text" id="toggle-password">
                <i class="bi bi-eye-slash"></i>
            </span>
        </div>
        @error('password')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
            </div>
            

            <div class="d-grid gap-2">
                <button type="submit" class="btn">Login</button>
            </div>
            <!-- <div class="d-grid gap-2">
                <button type="submit" class="btn">Login</button>
            </div> -->
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('register')}}" class="text-decoration-none text-primary hover-link">Don't have an account? Register</a>
            </div>
        </form>
        
        <style>
            .hover-link:hover {
                color: #24aee4 !important; /* Màu khi hover */
                text-decoration: underline !important; /* Gạch chân khi hover */
            }
        </style>
            <!-- <a href=""></a> -->
        </form>
    </div>
    @endsection