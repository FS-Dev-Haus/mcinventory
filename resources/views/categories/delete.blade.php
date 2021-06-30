@extends('layouts.main')

@section('title', 'Delete Category')

@section('add-css')
    
@endsection

@section('page-title', 'Delete Category')

@section('title-right')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">MC Inventory Manager</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item active">Delete Category</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Are you sure you want to delete this?</h4>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name" value="{{ $category->name }}" disabled>
                        </div>
                        <button type="submit" class="btn btn-block btn-danger waves-effect waves-light mt-2">Yes, Delete</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-block btn-info waves-effect waves-light mt-2">No wayy!!</a>
                    </form>

                </div>
                <!-- end card-body-->
            </div>
            <!-- End of card -->
        </div>
        <div class="col-3"></div>
    </div>
@endsection

@section('script')
    
@endsection