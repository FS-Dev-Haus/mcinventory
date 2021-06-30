@extends('layouts.main')

@section('title', 'Categories')

@section('add-css')
    <link href="{{ secure_asset('dist/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('dist/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('dist/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('dist/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title', 'Categories')

@section('title-right')
    <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="javascript: void(0);">MC Inventory Manager</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- End Right for Add Button -->
                    <div class="row mb-2">
                        <div class="col-12">
                                <div class="float-right">
                                    <!-- Start Add Button -->
                                    <a href="{{ route('categories.create') }}" class="btn btn-success waves-effect waves-light">
                                        Add Category<span class="btn-label-right"><i class="fe-plus-square"></i></span>
                                    </a>
                                    <!-- End Add Button -->
                                </div>
                        </div>
                    </div>
                    <!-- End Right for Add Button -->

                    @if ($message = Session::get('success'))
                        <div class="alert alert-info fade show">
                            <h4 class="mt-0">Yay!</h4>
                            <p class="mb-0">{{ $message }} :)</p>
                        </div>
                    @endif

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

                    <!-- Start Datatable -->
                    <table id="scroll-horizontal-datatable" class="table nowrap w-100">
                        <thead>
                            <tr>
                                <td style="width: 5%;">No.</td>
                                <td style="width: 65%;">Name</td>
                                <td style="width: 5%;">Items</td>
                                <td style="width: 25%;">Action</td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->items_count }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-purple waves-effect waves-light">
                                            Edit Category<span class="btn-label-right"><i class="fe-plus-square"></i></span>
                                        </a>
                                        <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger waves-effect waves-light">
                                            Delete Category<span class="btn-label-right"><i class="fe-plus-square"></i></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Datatable -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ secure_asset('dist/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ secure_asset('dist/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->    

    <!-- Datatables init -->
    <script src="{{ secure_asset('dist/assets/js/pages/datatables.init.js') }}"></script>
@endsection