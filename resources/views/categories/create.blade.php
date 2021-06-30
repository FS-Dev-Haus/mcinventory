@extends('layouts.main')

@section('title', 'Add Category')

@section('add-css')
    
@endsection

@section('page-title', 'Add Category Type')

@section('title-right')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">MC Inventory Manager</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categories</a></li>
        <li class="breadcrumb-item active">Add Category</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Fill in the Category Details</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('categories.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                        </div>
                        <button type="submit" class="btn btn-block btn-purple waves-effect waves-light mt-2">Add Category</button>
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