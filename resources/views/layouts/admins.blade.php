<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- LÔ GÔ --}}
    <link rel="shortcut icon" href="{{ asset('assets/admins/img/logo-fav.png') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/material-design-icons/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/app.css') }}" type="text/css">
    @yield('css')
</head>

<body>
    <div class="be-wrapper be-fixed-sidebar">
        {{-- HREDRNAV --}}
        @include('admins.blocks.header-nav')
        {{-- MAIN-SIDEBAR --}}
        @include('admins.blocks.main-sidebar')
        {{-- CONTENT --}}
        @yield('content')
        {{-- SIDEBAR --}}
        @include('admins.blocks.right')
    </div>
    <script src="{{ asset('assets/admins/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/perfect-scrollbar/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/js/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-flot/jquery.flot.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-flot/jquery.flot.pie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-flot/jquery.flot.time.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-flot/jquery.flot.resize.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-flot/plugins/jquery.flot.orderBars.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-flot/plugins/curvedLines.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-flot/plugins/jquery.flot.tooltip.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery.sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/countup/countUp.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jqvmap/jquery.vmap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //-initialize the javascript
            App.init();
            App.dashboard();

        });
    </script>
    @yield('js')
</body>

</html>
