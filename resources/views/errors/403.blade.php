<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('assets/admins/img/logo-fav.png') }}">
    <title>Beagle</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/material-design-icons/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/app.css') }}" type="text/css">
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-error be-error-404">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="error-container">
            <div class="error-number">403</div>
            <div class="error-description">Hành động này là trái phép.</div>
            <div class="error-goback-text">Bạn có muốn quay lại trang chủ?</div>
            <div class="error-goback-button"><a class="btn btn-xl btn-primary" href="/">Đển trang chủ</a></div>
            <div class="footer">&copy; 2024 Sneaker - Shop</div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('assets/admins/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/perfect-scrollbar/js/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  </body>
</html>