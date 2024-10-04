<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/style.css') }}" type="text/css">
    
    {{-- CSS --}}
    @yield('css')
</head>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header -->
    <header class="header-section">
        {{-- HEADER --}}
        @include('clients.blocks.header')
        {{-- NAV --}}
        @include('clients.blocks.navbar')
    </header>
    <!-- Header End -->

    {{-- CONTENT --}}
    @yield('content')

    <!-- Footer -->
    <footer class="footer-section">
        {{-- Footer --}}
        @include('clients.blocks.footer')
    </footer>
    <!-- Footer End -->

    <!-- Js Plugins -->
    <script src="{{ asset('assets/clients/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/clients/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/clients/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
