@extends('layouts.app')

@section('title', __('List Products'))
@section('content')
@if(session('flash_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('flash_success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="{{ route('createPro')}}"><button type="button" class="btn btn-success">Add Product</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Stock</th>
      <th scope="col">Image</th>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($products as $pro)
    <tr>

      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $pro->name}}</td>
      <td>{{number_format( $pro->price,0,',','.')}} VNĐ</td>
      <td>{{ $pro->description}}</td>
      <td>{{ $pro->stock}}</td>
      <td>
        <style>
          .image-hover:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
          }
        </style>

        <img src="{{ asset('storage/' . $pro->image) }}" alt="Image" class="border border-success rounded-3 image-hover" width="150" height="150">


      </td>
      <td>
        <a href=" {{route('editPro', $pro->id)}} " class="btn btn-warning">Edit</a>
        <button type="button" class="btn btn-danger"
          onclick="if(confirm('Bạn có chắc chắn muốn xóa?')) {
        document.getElementById('delete-form-{{ $pro->id }}').submit();
    }">Delete</button>

        <form id="delete-form-{{ $pro->id }}" action="{{ route('deletePro', $pro->id) }}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
        </form>
      </td>
    </tr>
    @endforeach
    <!-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
@endsection