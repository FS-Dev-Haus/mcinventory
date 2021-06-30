@extends('layouts.main')

@section('title', 'Update Item Details')

@section('add-css')
    <link href="{{ secure_asset('dist/assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">    
@endsection

@section('page-title', 'Update Item Details')

@section('title-right')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">MC Inventory Manager</a></li>
        <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
        <li class="breadcrumb-item active">Edit Item</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Update the Item Details</h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('items.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Item Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name}}" placeholder="Enter Item Name" required>
                        </div>
                        <div class="dropdown bootstrap-select mb-2">
                            <label for="category_id">Category</label>
                            <select class="selectpicker" data-live-search="true" data-style="btn-light" tabindex="-98" name="category_id" id="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($category as $id => $name)
                                    <option value="{{ $id }}" {{ (isset($item['category_id']) && $item['category_id'] == $id) ? ' selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price for Each</label>
                            <input type="text" maxlength="9" class="form-control" id="price" name="price" value="{{ number_format($item->price, 2) }}" placeholder="Enter Price for Each Item" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" max="1000000" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}" placeholder="Enter Quantity of Item" required>
                        </div>
                        <button type="submit" href="{{ route('items.index') }}" class="btn btn-block btn-purple waves-effect waves-light mt-2">Update Item</button>
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
    <script src="{{ secure_asset('dist/assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>    
@endsection