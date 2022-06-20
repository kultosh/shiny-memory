<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShinyMemory</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('admin.includes.header')


        @include('admin.includes.aside')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('admin.includes.footer')

    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
