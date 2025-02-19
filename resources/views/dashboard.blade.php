@extends('layouts.app')

@section('title', 'Dashboard')

@section('dashboard')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-lg p-4">
        <div class="card-body text-center">
            <h2 class="text-primary fw-bold">👋 Welcome, {{ Auth::user()->name ?? 'Guest' }}!</h2>
            <p class="text-muted">Quản lý sản phẩm, danh mục và đơn hàng của bạn một cách dễ dàng.</p>
            <!-- <a href="{{ route('listPro') }}" class="btn btn-primary mt-3">
                <i class="fas fa-box"></i> Quản lý sản phẩm
            </a>
            <a href="{{ route('listCate') }}" class="btn btn-success mt-3">
                <i class="fas fa-tags"></i> Quản lý danh mục
            </a>
            <a href="#" class="btn btn-warning mt-3">
                <i class="fas fa-shopping-cart"></i> Xem đơn hàng
            </a> -->
        </div>
    </div>
</div>
@endsection
