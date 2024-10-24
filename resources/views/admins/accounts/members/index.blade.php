@extends('layouts.admins')
@section('title')
    Quản lý tài khoản người dùng | ADMIN
@endsection
@section('css')
    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/material-design-icons/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/app.css') }}" type="text/css">
    <style>
        .user-avatar {
            object-fit: cover;
        }
        .user {
            font-weight: 400;
        }
        .ts {
            background: #daf5e2 !important;
            padding: 3px 10px;
            border-radius: 14px;
            border: 1px solid #34a853 !important;
        }
        .td {
            background: #fde6e3 !important;
            padding: 3px 10px;
            border-radius: 14px;
            border: 1px solid #ea4335!important;
        }
        .tc {
            background: #dddddd !important;
            padding: 3px 10px;
            border-radius: 14px;
            border: 1px solid #878787!important;
        }
    </style>
@endsection
@section('content')
    {{-- CONTENT --}}
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Nhân viên</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
                        <li class="breadcrumb-item active">Nhân viên</li>
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
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('warning')}}</div>
                    </div>
                @endif
                @error('name')
                    <div id="warningAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{ $message }}</div>
                    </div>
                @enderror
            </div>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div>Danh sách</div>
                                <div>
                                    {{-- Thêm mới --}}
                                    <a id="btnAdd" href="{{route('wp-admin.member.create')}}" class="btn btn-space btn-outline-success">
                                        Thêm mới <span class="icon mdi mdi-plus-circle"></span>
                                    </a>
                                    <a class="btn btn-space btn-outline-info" href="">Export excel
                                        <span class="icon mdi mdi-download"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover table-fw-widget text-center" id="table1">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Mã KH</th>
                                        <th>Địa chỉ email</th>
                                        <th>SĐT</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $key=>$member)
                                        <tr class="odd gradeX">
                                            <td>{{$key+1}}</td>
                                            <td class="user-avatar cell-detail user-info" style="text-align: start;">
                                                @if ($member->image != null)
                                                    <img style="object-fit: cover;" src="{{ Storage::url($member->image) }}" alt="avatar">
                                                @else
                                                    <img style="object-fit: cover;" src="{{ asset('assets/admins/img/avatar.png') }}" alt="avatar">
                                                @endif
                                                <span>{{$member->name}}</span>
                                                <span class="cell-detail-description user {{$member->role == 'Quản lý' ? 'text-danger' : 'text-info'}}">{{$member->role}}</span>
                                            </td>
                                            <td>{{$member->user_code}}</td>
                                            <td><span class="">{{$member->email}}</span></td>
                                            <td>{{$member->phone_number}}</td>
                                            <td>
                                                <span class="@if($member->status == 'Hoạt động') text-success ts @elseif($member->status == 'Đã khóa') text-secondary tc @else text-danger td @endif">
                                                    {{$member->status}}
                                                </span>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ route('wp-admin.member.show',$member->id) }}">Chi tiết <i class="icon mdi mdi-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- JAVASCRIPT-LINK --}}
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/jszip/jszip.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/pdfmake/pdfmake.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-buttons/js/buttons.print.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/admins/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"
            type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //-initialize the javascript
                App.init();
                App.dataTables();
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
