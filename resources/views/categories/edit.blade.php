@extends('layouts.main')

@section('title', 'Update Category Details')

@section('add-css')
    
@endsection

@section('page-title', 'Update Category Details')

@section('title-right')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">MC Inventory Manager</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item active">Edit Category</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Update the Category Details</h4>

                    <form action="{{ route('categories.update', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name" value="{{ $category->name }}">
                        </div>
                        <button type="submit" class="btn btn-block btn-purple waves-effect waves-light mt-2">Update Category</button>
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