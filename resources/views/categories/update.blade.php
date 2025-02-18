@extends('layouts.app')

@section('title',__('Update Category'))

@section('content')




<form action="{{ route('updateCate', ['id'=> $category->id])}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label" >Name</label>
    <input type="name" class="form-control" id="" aria-describedby="name" name="name" value="{{$category->name}}">
    @error('name')
      <div class="alert alert-danger small  mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="" class="form-label">Description</label>
    <input type="text" class="form-control" id="" aria-describedby="emailHelp" name="description" value="{{$category->description}}">
    @error('description')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
 
  <div class="mb-3">
    <label for="" class="form-label">Image</label>
  <div class="mb-3">
  <img src="{{ asset('storage/'. $category->image)}}" alt="" width="150px">
  </div>
    <input type="file" class="form-control" id="" aria-describedby="emailHelp" name="image">
    @error('image')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Parent_id</label>
    <input type="number" class="form-control" id="" aria-describedby="emailHelp" name="parent_id" value="{{$category->parent_id}}">
    @error('parent_id')
      <div class="alert alert-danger small mt-1">
        <i class="bi bi-exclamation-triangle"></i> {{ $message }}
      </div>
    @enderror
  </div>
 <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <a href="{{ route('listCate') }}" class="btn btn-secondary" style="margin-right:20px">Quay trở về</a>


  <button type="submit" class="btn btn-success">Submit</button>
</form>

@endsection