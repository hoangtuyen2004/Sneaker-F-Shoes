@extends('layouts.admins')
@section('title')
    Admin|Quản lý sản phẩm
@endsection
@section('css')
    {{-- CSS --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/bootstrap-slider/css/bootstrap-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/app.css') }}" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/material-design-icons/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/jquery.gritter/css/jquery.gritter.css') }}">
    <style>
        #btnColor {
            background-color: #FF8C00;
            width: 10%;
            border-radius: 8px;
            align-items: center;
        }
        input[type="checkbox"] {
            display: none;
        }
        #ckb {
            width: 1% !important;
        }
        #sanPham {
            width: 14% !important;
        }
        #kichCo {
            width: 10% !important;
        }
        /* 45+35+ 25*/
        #canNang {
            width: 10% !important;
        }
        #soLuong {
            width: 10% !important;
        }
        #gia {
            width: 10% !important;
        }
        #xoa {
            width: 2% !important;
        }
        #anh {
            width: 35% !important;
        }
        .input-smail {
            height: 28px !important;
        }
    </style>
    <style>
        #myFile {
            display: none;
        }
        .custom-file-upload {
            border: 1px solid #ccc;
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            width: 100px;
            height: 100px;
            align-content: center;
        }
    </style>
@endsection
@section('content')
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Thêm mới sản phẩm</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item"><a href="#">Quản lý sản phẩm</a></li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="main-content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-divider text-center">
                            <h3 class="m-0 p-0 text-secondary"><strong>Thông tin sản phẩm</strong></h3>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="w-50 m-auto">
                                    <div class="form-group row">
                                        <div class="col-12 col-sm-8 col-lg-12">
                                            <label class="label-control">Tên sản phẩm</label>
                                            <input class="form-control form-control-sm" id="inputSmall" type="text"
                                                placeholder="Tên sản phẩm">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-lg-6">
                                            <label class="label-control">Loại giày</label>
                                            <select class="select2 select2-sm form-control form-control-sm">
                                                <option></option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-6">
                                            <label class="label-control">Thương hiệu</label>
                                            <select class="select2 select2-sm form-control form-control-sm">
                                                <option></option>
                                                @foreach ($soles as $sole)
                                                    <option value="{{ $sole->id }}">{{ $sole->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-lg-6">
                                            <label class="label-control">Đế giày</label>
                                            <select class="select2 select2-sm form-control form-control-sm">
                                                <option></option>
                                                @foreach ($materials as $material)
                                                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-6 col-lg-6">
                                            <label class="label-control">Chất liệu</label>
                                            <select class="select2 select2-sm form-control form-control-sm">
                                                <option></option>
                                                @foreach ($trademarks as $trademark)
                                                    <option value="{{ $trademark->id }}">{{ $trademark->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 col-sm-8 col-lg-12">
                                            <label class="label-control">Mô tả sản phẩm</label>
                                            <textarea class="form-control" id="inputTextarea3" placeholder="Nhập mô tả sản phẩm"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-divider text-center">
                            <h3 class="m-0 p-0 text-secondary"><strong>Màu sắc & kích cỡ</strong></h3>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="w-50 m-auto">
                                    {{-- Màu sắc --}}
                                    <div class="color">
                                        <div class="form-group row pt-2">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <h4 class="col-2 mr-3"><strong>Màu sắc : </strong></h4>
                                                    <div class="col align-content-center">
                                                        <div class="row">
                                                            <div class="colorList col" style="display: flex; gap: 10px">
                                                                {{-- Hiển thị màu sắc tại đây --}}
                                                            </div>
                                                            <button id="btnColor" class="btn btn-space btn-warning col-1" data-bs-toggle="modal" data-bs-target="#Color_modal">
                                                                <i class="icon mdi mdi-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal" id="Color_modal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form id="formColor">
                                                                        <div class="modal-header d-block">
                                                                            <h3 class="modal-title text-center">Chọn màu sắc</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="m-auto">
                                                                                <div class="form-group row mx-3">
                                                                                    @foreach ($colors as $color)
                                                                                        <div class="mx-1">
                                                                                            <input type="checkbox" name="{{$color->color_code}}" id="{{$color->color_code}}">
                                                                                            <label onclick="loadColor('{{$color->id}}','{{$color->color_code}}')" style="border: 2px solid {{$color->color_code}};" for="{{$color->color_code}}">
                                                                                                <style>
                                                                                                    label[for='{{$color->color_code}}'] {
                                                                                                    display: inline-block;
                                                                                                    padding: 10px 20px;
                                                                                                    color: black;
                                                                                                    background-color: #FFFFFF;
                                                                                                    border: none;
                                                                                                    border-radius: 5px;
                                                                                                    cursor: pointer;
                                                                                                    transition: background-color 0.3s ease;
                                                                                                    }
                                                                                                    label[for='{{$color->color_code}}']:hover {
                                                                                                        color: {{$color->color_code}};
                                                                                                    }
                                                                                                    
                                                                                                </style>
                                                                                                <strong>
                                                                                                    {{$color->name}}
                                                                                                </strong>
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Đóng</a>
                                                                            <button class="btn btn-success">Thêm mới</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Kích thước --}}
                                    <div class="color">
                                        <div class="form-group row pt-2">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <h4 class="col-2 mr-3"><strong>Kích cỡ : </strong></h4>
                                                    <div class="col align-content-center">
                                                        <div class="row">
                                                            <div class="colorSize col" style="display: flex; gap: 10px">
                                                                {{-- Hiển thị kích cỡ tại đây --}}
                                                            </div>
                                                            <button id="btnColor" class="btn btn-space btn-warning col-1" data-bs-toggle="modal" data-bs-target="#Size_modal">
                                                                <i class="icon mdi mdi-plus"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal" id="Size_modal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form id="formColor">
                                                                        <div class="modal-header d-block">
                                                                            <h3 class="modal-title text-center">Chọn kích cỡ</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="m-auto">
                                                                                <div class="form-group row mx-3">
                                                                                    @foreach ($sizes as $size)
                                                                                        <div class="mx-1">
                                                                                            <input type="checkbox" name="" id="size{{$size->size_code}}">
                                                                                            <label onclick="loadSize('{{$size->id}}','{{$size->size_code}}')" style="border: 2px solid black;" for="size{{$size->size_code}}">
                                                                                                <style>
                                                                                                    label[for='size{{$size->size_code}}'] {
                                                                                                    display: inline-block;
                                                                                                    padding: 10px 20px;
                                                                                                    color: black;
                                                                                                    background-color: #FFFFFF;
                                                                                                    border: none;
                                                                                                    border-radius: 5px;
                                                                                                    cursor: pointer;
                                                                                                    transition: background-color 0.3s ease;
                                                                                                    }
                                                                                                    label[for='size{{$size->size_code}}']:hover {
                                                                                                        background-color: #DCDCDC;
                                                                                                    }
                                                                                                    
                                                                                                </style>
                                                                                                <strong>
                                                                                                    {{$size->name}}
                                                                                                </strong>
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Modal footer -->
                                                                        <div class="modal-footer">
                                                                            <a type="button" class="btn btn-danger text-light" data-bs-dismiss="modal">Đóng</a>
                                                                            <button class="btn btn-success">Thêm mới</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-divider">
                            <div class="d-flex justify-content-between" style="align-items: center;">
                                <h4 class="m-0 p-0 text-secondary"><strong>Danh sách biến thể</strong></h4>
                                <button class="btn btn-space btn-outline-warning btn-space">Khôi phục</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table class="table text-center" id="table1">
                                    <thead>
                                        <tr>
                                            <th class="in-progress" style="width: 5%;">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" id="checkAll">
                                                    <label class="custom-control-label labelAll" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Sản phẩm</th>
                                            <th>Kích thước</th>
                                            <th>Cân nặng</th>
                                            <th>Số lượng</th>
                                            <th>Giá</th>
                                            <th><i style="font-size: 16px;" class="mdi mdi-delete"></i></th>
                                            <th>Ảnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td id="ckb" data-status="in-progress">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input class="custom-control-input allItem" type="checkbox" id="{{$material->id}}" value="{{$material->id}}">
                                                    <label class="custom-control-label labelItem" for="{{$material->id}}"></label>
                                                </div>
                                            </td>
                                            <td id="sanPham">kkkk</td>
                                            <td id="kichCo">1</td>
                                            <td id="canNang"><input class="form-control input-smail" value="500"  type="text"></td>
                                            <td id="soLuong"><input class="form-control input-smail" value="100"  type="text"></td>
                                            <td id="gia"><input class="form-control input-smail" value="100,000"  type="text"></td>
                                            <td id="xoa"><i style="font-size: 16px;" class="mdi mdi-delete"></i></td>
                                            <td id="anh" rowspan="2">
                                                <div>
                                                    <label for="myFile" class="custom-file-upload">
                                                        <i class="mdi mdi-collection-image-o"></i> Ảnh
                                                    </label>
                                                    <input type="file" multiple id="myFile" />
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td id="ckb" data-status="in-progress">
                                                <div class="custom-control custom-control-sm custom-checkbox">
                                                    <input class="custom-control-input allItem" type="checkbox" id="{{$material->id}}" value="{{$material->id}}">
                                                    <label class="custom-control-label labelItem" for="{{$material->id}}"></label>
                                                </div>
                                            </td>
                                            <td id="sanPham">kkkk</td>
                                            <td id="kichCo">1</td>
                                            <td id="canNang"><input class="form-control input-smail" value="500"  type="text"></td>
                                            <td id="soLuong"><input class="form-control input-smail" value="100"  type="text"></td>
                                            <td id="gia"><input class="form-control input-smail" value="100,000"  type="text"></td>
                                            <td id="xoa"><i style="font-size: 16px;" class="mdi mdi-delete"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{-- JS --}}
    <script src="{{ asset('assets/admins/lib/jquery.nestable/jquery.nestable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/moment.js/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/select2/js/select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admins/lib/bootstrap-slider/bootstrap-slider.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/admins/lib/bs-custom-file-input/bs-custom-file-input.js') }}" type="text/javascript">
    </script>
    {{-- Form --}}
        <script src="{{ asset('assets/admins/lib/perfect-scrollbar/js/perfect-scrollbar.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/admins/lib/bootstrap/dist/js/bootstrap.bundle.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/admins/lib/jquery.gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //-initialize the javascript
                App.init();
                App.uiNotifications();
                App.formElements();
            });
        </script>
    {{-- <script>
        $("#not-success").click(function () { $.gritter.add({ title: "Thông báo!", text: "Thành công cập nhập thành công.", class_name: "color success" }) })
    </script> --}}
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
    {{-- Màu sắc --}}
    <script>
        let dataColor = [];
        let dataCode = [];
        function loadColor(id,color_code) {
            //ID màu 
                dataColor.push(id);
                const uniqueSet = new Set(dataColor);//
                const uniqueArr = [...uniqueSet];   //Lọc mảng
                localStorage.setItem('dataColor', JSON.stringify(uniqueArr));
            //Mã màu
                dataCode.push(color_code);
                const uniqueCode = new Set(dataCode);
                const uniqueCodeArr = [...uniqueCode];
                dataCode = uniqueCodeArr;

            let elementColor = "";
            uniqueCodeArr.forEach((element,index) => {
                elementColor =  elementColor+`
                        <div style="width: 50px;height: 30px;background-color: ${element};border-radius: 8px;text-align:center !important;">
                            <button onclick="trasColor(${index})" style="font-size:20px;" class="btn text-light">
                                <i class="mdi mdi-close-circle"></i>
                            </button>
                        </div>
                `;         
                document.querySelector('.colorList').innerHTML = elementColor;
            });
        }
        function trasColor(index) {
            dataCode.splice(index,1);
            if(dataCode.length == 0) {
                let elementColor = "";
                document.querySelector('.colorList').innerHTML = elementColor;
            }
            else {
                let elementColor = "";
                dataCode.forEach((element,index) => {
                    elementColor =  elementColor+`
                            <div style="width: 50px;height: 30px;background-color: ${element};border-radius: 8px;text-align:center !important;">
                                <button onclick="trasColor(${index})" style="font-size:20px;" class="btn text-light">
                                    <i class="mdi mdi-close-circle"></i>
                                </button>
                            </div>
                    `;         
                    document.querySelector('.colorList').innerHTML = elementColor;
                });
            }
        }
    </script>
    {{-- Kích cỡ --}}
    <script>
        let dataSize = [];
        let dataCodeSize = [];
        function loadSize(id,code_size) {
            dataSize.push(id);
            const uniqueSet = new Set(dataSize);
            const uniqueSize = [...uniqueSet];
            dataSize = uniqueSize;

            dataCodeSize.push(code_size);
            const uniqueCode = new Set(dataCodeSize);
            const uniqueCodeSize = [...uniqueCode];
            dataCodeSize = uniqueCodeSize;

            let elementColor = "";
            dataCodeSize.forEach((element,index) => {
                elementColor =  elementColor+`
                        <div style="width: 50px;height: 30px;border:1px solid black;border-radius: 8px;text-align:center !important;">
                            <button onclick="trasSize(${index})" class="btn">
                                ${element}
                            </button>
                        </div>
                `;         
                document.querySelector('.colorSize').innerHTML = elementColor;
            });
        }
        function trasSize(index) {
            dataCodeSize.splice(index,1);
            if(dataCodeSize.length == 0) {
                let elementColor = "";
                document.querySelector('.colorSize').innerHTML = elementColor;
            }
            else {
                let elementColor = "";
                dataCodeSize.forEach((element,index) => {
                    elementColor =  elementColor+`
                             <div style="width: 50px;height: 30px;border:1px solid black;border-radius: 8px;text-align:center !important;">
                            <button onclick="trasSize(${index})" class="btn">
                                ${element}
                            </button>
                        </div>
                    `;         
                    document.querySelector('.colorSize').innerHTML = elementColor;
                });
            }
        }
    </script>
@endsection
