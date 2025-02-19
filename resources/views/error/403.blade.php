@extends('error.error')

@section('title', '403 - Forbidden')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center vh-100 text-center">
    <h1 class="display-1 fw-bold text-danger">403</h1>
    <h3 class="text-dark">Truy cập bị từ chối</h3>
    <p class="lead text-muted">Xin lỗi! Bạn không có quyền truy cập trang này.</p>
    
    <a href="{{ route('login') }}" class="btn btn-primary mt-3">
        <i class="bi bi-arrow-left"></i> Quay lại
        </a>
</div>

<style>
    body {
        background-color:rgb(216, 216, 216);
    }
</style>
@endsection
