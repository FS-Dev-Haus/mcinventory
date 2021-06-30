@extends('layouts.main')

@section('title', 'Profile')

@section('add-css')
    <!-- Sweet Alert-->
    <link href="{{ secure_asset('dist/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('page-title', 'My Profile')

@section('title-right')
    <a href="{{ route('users.delete', auth()->user()->id) }}" class="btn btn-danger waves-effect waves-light">
        Delete Account<span class="btn-label-right"><i class="mdi mdi-close-circle-outline"></i></span>
    </a>
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card-box h-100">
                <h4 class="header-title">Account Details</h4>

                @if ($message = Session::get('success-details'))
                    <div class="alert alert-info fade show">
                        <h4 class="mt-0">Yay!</h4>
                        <p class="mb-0">{{ $message }} :)</p>
                    </div>
                @endif

                @if ($errors->hasBag('details'))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems.<br><br>
                        <ul>
                            @foreach ($errors->details->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('users.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="fullname">Full Name * :</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email * :</label>
                        <input type="email" id="email" class="form-control" name="email"
                                data-parsley-trigger="change" required value="{{ $user->email }}">
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-block btn-success">Update Details</button>
                    </div>
                </form>
            </div> <!-- end card-box-->
        </div> <!-- end col-->
        <div class="col-6">
            <div class="card-box h-100">
                <h4 class="header-title">Change Password</h4>

                @if ($message = Session::get('success-pw'))
                    <div class="alert alert-info fade show">
                        <h4 class="mt-0">Yay!</h4>
                        <p class="mb-0">{{ $message }} :)</p>
                    </div>
                @endif

                @if ($errors->hasBag('pw'))
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems.<br><br>
                        <ul>
                            @foreach ($errors->pw->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="parsley-examples" action="{{ route('users.updatePw', Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="currentpass">Current Password<span class="text-danger">*</span></label>
                        <input id="currentpass" name="currentpass" type="password" placeholder="Current Password" required
                                class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password<span class="text-danger">*</span></label>
                        <input id="password" name="password" type="password" placeholder="Password" required
                                class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                        <input data-parsley-equalto="#password" type="password" required
                                placeholder="Password" class="form-control" id="passWord2">
                    </div>

                    <div class="form-group mb-0">
                        <input type="submit" class="btn btn-block btn-success" value="Change Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <!-- Plugin js-->
    <script src="{{ secure_asset('dist/assets/libs/parsleyjs/parsley.min.js') }}"></script>
    
    <!-- Validation init js-->
    <script src="{{ secure_asset('dist/assets/js/pages/form-validation.init.js') }}"></script>
    
    <!-- Sweet Alerts js -->
    <script src="{{ secure_asset('dist/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Sweet alert init js-->
    <script src="{{ secure_asset('dist/assets/js/pages/sweet-alerts.init.js') }}"></script>
@endsection
