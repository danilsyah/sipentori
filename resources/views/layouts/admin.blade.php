<!DOCTYPE html>
<html lang="en" dir="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('includes.style')
</head>

<body class="text-left">
    <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">
        <div class="loader spinner-glow spinner-glow-primary"></div>
    </div>
    <!-- Pre Loader end  -->
    <div class="app-admin-wrap layout-sidebar-large clearfix">
        <!-- header top menu -->
        @include('includes.navbar')
        <!-- header top menu end -->
        <!--=============== Left side ================-->
        @include('includes.sidebar')
        <!--=============== Left side End ================-->
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            @yield('content')
            <!-- ============ Body content End ============= -->
            @include('includes.footer')
        </div>
    </div>
    <!--=============== End app-admin-wrap ================-->
 
    @include('includes.script')
</body>

</html>
