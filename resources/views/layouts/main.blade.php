<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="shortcut icon" href="{{ secure_asset('icon.ico') }}" type="image/x-icon">

    <!-- plugin css -->
    <link href="{{ secure_asset('dist/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    @yield('add-css')
    <!-- App css -->
    <link href="{{ secure_asset('dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ secure_asset('dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="wrapper">
        @include('layouts.vertical')
    </div>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                @yield('title-right')
                            </div>
                            <h4 class="page-title">@yield('page-title')</h4>
                        </div>
                    </div>
                </div>     
                <!-- end page title --> 

                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.script')
    @yield('script')
</body>
</html>