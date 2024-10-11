@extends('layouts.admins')
@section('title')
    Admin
@endsection
@section('css')
    {{-- CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/trademark-design-icons/css/trademark-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/app.css') }}" type="text/css">
@endsection
@section('content')
    {{-- CONTENT --}}
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Thương hiệu</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thương hiệu</li>
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
                                    <button id="btnAdd" type="button" class="btn btn-space btn-outline-success" data-bs-toggle="modal" data-bs-target="#myModal">
                                        Thêm mới <span class="icon mdi mdi-plus-circle"></span>
                                    </button>
                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('trademark.store') }}" id="FormLoad" method="post">
                                                    @csrf
                                                    <!-- Modal Header -->
                                                    <div class="modal-header d-block">
                                                        <h3 class="modal-title text-center">Thêm mới thương hiệu</h3>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="">
                                                            <div class="form-group row mt-2">
                                                                <div class="col">
                                                                    <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text" placeholder="Tên thương hiệu">
                                                                    @error('name')
                                                                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Thêm mới</button>
                                                        <a type="button" class="btn btn-danger text-light"
                                                            data-bs-dismiss="modal">Hủy</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Xóa --}}
                                    <button class="btn btn-space btn-outline-danger" data-toggle="modal" data-target="#mod-danger" type="button">
                                        Xóa <span class="icon mdi mdi-cloud-off"></span>
                                    </button>
                                    <div class="modal fade" id="mod-danger" tabindex="-1" role="dialog">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button class="close" type="button" data-dismiss="modal" aria-hidden="true"><span class="mdi mdi-close"></span></button>
                                            </div>
                                            <div class="modal-body">
                                              <div class="text-center">
                                                <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                                <h3>Thông báo!</h3>
                                                <p>Bạn có chắc muốn xóa những Thương hiệu được chọn!</p>
                                                <div class="mt-8">
                                                  <button class="btn btn-space btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                                                  <button class="btn btn-space btn-danger" type="button" data-dismiss="modal">Xác nhận</button>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="modal-footer"></div>
                                          </div>
                                        </div>
                                      </div>
                                    <a class="btn btn-space btn-outline-info" href="">Export excel
                                        <span class="icon mdi mdi-download"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover table-fw-widget text-center" id="table1">
                                <thead>
                                    <tr>
                                        <th class="in-progress" style="width: 5%;">
                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                <input class="custom-control-input" type="checkbox" id="checkAll">
                                                <label class="custom-control-label labelAll" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Ngày thêm</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trademarks as $key=>$trademark)
                                        <tr class="odd gradeX">
                                            <td data-status="in-progress">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input class="custom-control-input allItem" type="checkbox" id="{{$trademark->id}}" value="{{$trademark->id}}">
                                                    <label class="custom-control-label labelItem" for="{{$trademark->id}}"></label>
                                                </div>
                                            </td>
                                            <td>{{$key+1}}</td>
                                            <td>{{$trademark->name}}</td>
                                            <td>{{$trademark->created_at}}</td>
                                            <td>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Delete{{$trademark->id}}" type="submit">
                                                    Xóa <i class="mdi mdi-delete"></i>
                                                </button>
                                                <div class="modal" id="Delete{{$trademark->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('trademark.destroy',$trademark->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-header d-block">
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div class="modal-body">
                                                                    <div class="text-center">
                                                                    <div class="text-danger"><span class="modal-main-icon mdi mdi-close-circle-o"></span></div>
                                                                    <h3>Thông báo!</h3>
                                                                    <p>Bạn có chắc muốn xóa thương hiệu: {{$trademark->name}}!</p>
                                                                    <div class="mt-8">
                                                                        <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</a>
                                                                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                                                                    </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Modal footer -->
                                                                <div class="modal-footer">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#Modal{{$trademark->id}}">
                                                    Sửa <span class="icon mdi mdi-edit"></span>
                                                </button>
                                                <div class="modal text-left" id="Modal{{$trademark->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('trademark.update',$trademark->id) }}" method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header d-block">
                                                                    <h3 class="text-center"><strong>Thương hiệu</strong></h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <label for="">Tên thương hiệu</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $trademark->name }}">
                                                                    @error('name')
                                                                        <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-info">Lưu</button>
                                                                    <a href="" class="btn btn-warning" data-bs-dismiss="modal">Hủy</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
            $(document).ready(function() {
                $('#FormLoad').submit(function(event) {
                    // event.preventDefault();
                    // var formData = $(this).serialize(); // Chuyển dữ liệu form thành chuỗi
                    // $.ajax({
                    //     url: "{{ route('trademark.store') }}", // Đường dẫn đến file xử lý dữ liệu trên server
                    //     type: 'POST',
                    //     data: $(this).serialize(),
                    //     success: function(response) {
                    //         console.log(response);
                    //     },
                    //     error: function() {
                    //         console.log('Có lỗi xảy ra');
                    //     }
                    // });
                });
            });
        </script>
        <script>
            const checkAll = document.querySelector('#checkAll');
            const labelAll = document.querySelector('.labelAll');
            const allItem = document.querySelectorAll('.allItem');
            const labelItem = document.querySelectorAll('.labelItem');
            checkAll.addEventListener('change', ()=> {
                allItem.forEach(checkBox=>{
                    checkBox.checked = checkAll.checked;
                });
                labelItem.forEach(Item=>{
                    Item = labelAll;
                });
                
            })
            labelAll.addEventListener('change', ()=> {
                allItem.forEach(checkBox=>{
                    checkBox.checked = checkAll.checked;
                });
                labelItem.forEach(Item=>{
                    Item = labelAll;
                });
            })
        </script>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const alert = document.querySelector('.alert');
                alert.style.display = "none";
            }, 5000);
            });
        </script>
@endsection
