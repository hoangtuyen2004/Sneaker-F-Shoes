@extends('layouts.admins')
@section('title')
    ADMIN
@endsection
@section('css')
    {{-- CSS --}}
@endsection
@section('content')
    {{-- CONTENT --}}
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Chi tiết</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active">Người dùng</li>
                        <li class="breadcrumb-item active">Chi tiết</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4 p-3">
                @if (session('success'))
                    <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('success')}}</div>
                    </div>
                @elseif (session('warning'))
                    <div id="warningAlert" class="alert alert-warning alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-alert-circle-o"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('warning')}}</div>
                    </div>
                @elseif (session('error'))
                    <div id="warningAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-alert-triangle"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('error')}}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="main-content container-fluid">
            
        </div>
    </div>
@endsection
@section('js')
    {{-- JAVASCRIPT-LINK --}}
        <script type="text/javascript">
          $(document).ready(function(){
              //-initialize the javascript
              App.init();
              App.dashboard();
          });
        </script>
    {{-- JS --}}
        <script>
            window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const alert = document.querySelector('.alert');
                alert.style.display = "none";
            }, 5000);
            });
        </script>
@endsection
