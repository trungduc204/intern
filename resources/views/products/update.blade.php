@extends('layouts.app')

@section('title',__('Edit Prodcuct'))

@section('content')




<form action="{{ route('updatePro', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Name</label>
    <input type="name" class="form-control" id="" aria-describedby="name" name="name" value="{{$product->name}}">
    @error('name')
      <div class="alert alert-danger small  mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="price" value="{{$product->price}}"   >
    @error('price')
      <div class="alert alert-danger small mt-1 ">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="description" value="{{$product->description}}">
    @error('description')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Stock</label>
    <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="stock" value="{{$product->stock}}">
    @error('stock')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Image</label>
    @if($product->image)
        <div>
        <style>
          .image-hover:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
          }
        </style>

        <img src="{{ asset('storage/' . $product->image) }}" alt="Image" class="border border-success rounded-3 image-hover mb-3" width="150" height="150">
        </div>
    @endif
    <input type="file" class="form-control" id="" aria-describedby="emailHelp" name="image" value="{{$product->name}}">
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