<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('backend/assets/styles/css/themes/lite-purple.min.css') }}">
</head>

<body class="text-left">
    <div class="auth-layout-wrap" style="background-image: url({{ url('backend/assets/images/photo-wide-4.jpg') }})">
       @yield('content')
    </div>

    <script src="{{ url('backend/assets/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('backend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('backend/assets/js/es5/script.min.js') }}"></script>
</body>

</html>