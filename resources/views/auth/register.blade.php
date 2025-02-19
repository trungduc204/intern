@extends('layouts.au')
@section('title',__('Login Manager'))

@section('content')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<div class="login-container">
        <h4 class="text-center text-info">Register</h4>
        
        <form action="{{ route('register')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" value="{{ old('name') }}">
        @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
           
            </div>
           
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
            
            <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <div class="input-group">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
            <span class="input-group-text toggle-password">
                <i class="bi bi-eye-slash"></i>
            </span>
        </div>
        @error('password_confirmation')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn">Register</button>
            </div>
            <!-- <div class="d-grid gap-2">
                <button type="submit" class="btn">Login</button>
            </div> -->
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('login')}}" class="text-decoration-none text-primary hover-link">You already have an account? Login</a>
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