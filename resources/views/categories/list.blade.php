@extends('layouts.app')

@section('title', __('List Category'))
@section('content')
@if(session('flash_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('flash_success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="{{ route('createCate')}}"><button type="button" class="btn btn-success">Add Category</button></a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Name</th>
      <!-- <th scope="col">Price</th> -->
      <th scope="col">Description</th>

      <th scope="col">Image</th>
      <th scope="col">Parent_id</th>
      <td scope="col">Action</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $cate)
    <tr>

      <th scope="row">{{ $loop->iteration}}</th>
      <td>{{ $cate->name}}</td>

      <td>{{ $cate->description}}</td>
      <!-- <td>{{ $cate->stock}}</td> -->
      <td>
        <style>
          .image-hover:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
          }
        </style>

        <img src="{{ asset('storage/' . $cate->image) }}" alt="Image" class="border border-success rounded-3 image-hover" width="150" height="150">


      </td>
      <td>{{ $cate->parent_id}}</td>
      <td>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#scrollableModal-{{ $cate->id}}">
          Info
        </button>
<a href="{{ route('editCate', $cate->id)}}" class="btn btn-warning">Edit</a>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
          data-bs-target="#deleteModal-{{ $cate->id }}">
          Delete
        </button>
        <!-- <button type="button" class="btn btn-danger"
          onclick="if(confirm('Bạn có chắc chắn muốn xóa?')) {
        document.getElementById('delete-form-{{ $cate->id }}').submit();
    }">Delete</button>

        <form id="delete-form-{{ $cate->id }}" action="{{ route('deleteCate', $cate->id) }}" method="POST" style="display: none;">
          @csrf
          @method('DELETE')
        </form> -->
      </td>
      <!-- Modal riêng cho từng sản phẩm -->
      <div class="modal fade" id="deleteModal-{{ $cate->id }}" tabindex="-1"
        aria-labelledby="deleteModalLabel-{{ $cate->id }}" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteModalLabel-{{ $cate->id }}">Confirm Deletion</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              Are you sure delete <strong>{{ $cate->name }}</strong> ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <form action="{{ route('deleteCate', $cate->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirm Deletion</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="scrollableModal-{{ $cate->id}}" tabindex="-1" aria-labelledby="scrollableModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="scrollableModalLabel-{{ $cate->id}}">{{$cate->name}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <img src="{{ asset('storage/' .$cate->image)}}" alt="" width="450px">
              <!-- <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        <p>Morbi tincidunt ligula eget purus accumsan, a ultricies ligula eleifend. Aenean a massa at odio venenatis fermentum in eget arcu. Duis pharetra bibendum felis, sed dictum sapien facilisis vel.</p>
        <p>... (Thêm nhiều nội dung nếu muốn kiểm tra cuộn) ...</p> -->
            </div>
            <p>{{$cate->description}}</p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <a href="{{ route('editCate', $cate->id)}}" class="btn btn-warning">Edit</a>
            </div>
          </div>
        </div>
      </div>
      <!-- Vertically centered modal -->


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
<!-- Button trigger modal -->

@endsection