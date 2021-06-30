@extends('layouts.main')

@section('title', 'Dashboard')
@section('page-title', 'Welcome!')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-body">
                <h3 class="card-title">Congratulations!!</h3>
                <p class="card-text">You are logged in.</p>
                <a href="{{ route('items.index') }}" class="btn btn-primary waves-effect waves-light">View your items inventory</a><br>
                <a href="{{ route('categories.index') }}" class="btn btn-danger waves-effect waves-light">View your category</a>
            </div>
        </div>
    </div>
@endsection
