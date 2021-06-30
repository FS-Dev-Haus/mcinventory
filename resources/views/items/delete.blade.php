@extends('layouts.main')

@section('title', 'Delete Item')

@section('add-css')
    <link href="{{ secure_asset('dist/assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css">    
@endsection

@section('page-title', 'Delete Item')

@section('title-right')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">MC Inventory Manager</a></li>
        <li class="breadcrumb-item"><a href="{{ route('items.index') }}">Items</a></li>
        <li class="breadcrumb-item active">Delete Item</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Are you sure you want to delete this?</h4>

                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="name">Item Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" placeholder="Enter Item Name" disabled>
                        </div>
                        <div class="dropdown bootstrap-select mb-2">
                            <label for="category_id">Category</label>
                            <select class="selectpicker" data-live-search="true" data-style="btn-light" tabindex="-98" name="category_id" id="category_id" disabled>
                                <option>Select Category</option>
                                @foreach($category as $id => $name)
                                    <option value="{{ $id }}" {{ (isset($item['category_id']) && $item['category_id'] == $id) ? ' selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price for Each</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ number_format($item->price, 2) }}" placeholder="Enter Price for Each Item" disabled>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}" placeholder="Enter Quantity of Item" disabled>
                        </div>
                        <button type="submit" class="btn btn-block btn-danger waves-effect waves-light mt-2">Yes, Delete</button>
                        <a href="{{ route('items.index') }}" class="btn btn-block btn-info waves-effect waves-light mt-2">No wayy!!</a>
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