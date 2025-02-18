@extends('layouts.au')
@section('title',__('Login Manager'))

@section('content')

<div class="login-container">
        <h4 class="text-center text-info">Register</h4>
        
        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="input-group-text" id="toggle-password">
                        <i class="bi bi-eye-slash"></i>
                    </span>
                </div>
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