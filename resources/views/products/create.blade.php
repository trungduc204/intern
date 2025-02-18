@extends('layouts.app')

@section('title',__('Add Prodcuct'))

@section('content')




<form action="{{ route('storePro')}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Name</label>
    <input type="name" class="form-control" id="" aria-describedby="name" name="name">
    @error('name')
      <div class="alert alert-danger small  mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="price">
    @error('price')
      <div class="alert alert-danger small mt-1 ">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="description">
    @error('description')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Stock</label>
    <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="stock">
    @error('stock')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Image</label>
    <input type="file" class="form-control" id="" aria-describedby="emailHelp" name="image">
    @error('image')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <a href="{{ route('listPro') }}" class="btn btn-secondary" style="margin-right:20px">Quay trở về</a>


  <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection