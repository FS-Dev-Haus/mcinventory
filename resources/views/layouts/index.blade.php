<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <!-- Tag holded -->
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name') }} - @yield('title')</title>
        <link rel="shortcut icon" href="{{ secure_asset('icon.ico') }}" type="image/x-icon">

        <!-- Importing Bootstrap 4 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body class="h-100">
        @include('layouts.script')

        <!-- Start of body content -->
        <section class="content h-100">
            <div class="container-fluid h-100">
                @yield('content')
            </div>
        </section>
    </body>
</html>