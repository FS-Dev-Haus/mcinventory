@extends('layouts.index')

@section('title', 'Coming Soon')

@section('content')
    <div class="row h-100">
        <div class="col-8 m-auto text-center">
            <div>
                <img src="{{ secure_asset('img/MClogo.png') }}" alt="MC Logo">
            </div>
            <div class="bg-dark text-light">
                <h1>Hello visitors!</h1>
            </div>
            <div>
                <h3>We are Coming Soon!!</h3>
            </div>
        </div>
    </div>
@endsection