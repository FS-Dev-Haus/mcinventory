@extends('layouts.main')

@section('title', 'Delete Category')

@section('add-css')
    
@endsection

@section('page-title', 'Delete Category')

@section('title-right')
    <p>End Right</p>
@endsection

@section('content')
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3 header-title">Are you sure you want to delete your account?</h4>

                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="form-group">
                            <label for="fullname">Full Name * :</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="email">Email * :</label>
                            <input type="email" id="email" class="form-control" name="email"
                                    data-parsley-trigger="change" required value="{{ $user->email }}" disabled>
                        </div>
                        <button type="submit" class="btn btn-block btn-danger waves-effect waves-light mt-2">Yes, Delete</button>
                        <a href="{{ route('users.edit', auth()->user()->id) }}" class="btn btn-block btn-info waves-effect waves-light mt-2">No wayy!!</a>
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