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
        .ckb {
            width: 1% !important;
        }
        .sanPham {
            width: 14% !important;
        }
        .kichCo {
            width: 10% !important;
        }
        /* 45+35+ 25*/
        .canNang {
            width: 10% !important;
        }
        .soLuong {
            width: 10% !important;
        }
        .gia {
            width: 10% !important;
        }
        .xoa {
            width: 2% !important;
        }
        .anh {
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
            <div class="col-4 p-3">
                @if (session('success'))
                    <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('success')}}</div>
                    </div>
                @elseif (session('danger'))
                    <div id="dangerAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close" aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{session('danger')}}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="main-content container-fluid">
            <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">{{---Sản phẩm---}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-divider text-center">
                                <h3 class="m-0 p-0 text-secondary"><strong>Thông tin sản phẩm</strong></h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="w-50 m-auto">
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-12">
                                                <label class="label-control">Tên sản phẩm</label>
                                                <input onchange="listForm()" name="name" class="form-control form-control-sm" id="inputSmall" type="text" value="{{ old('name') }}"
                                                    placeholder="Tên sản phẩm">
                                                @error('name')
                                                    <p class="parsley-errors-list filled" style="font-size: 13px">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-lg-6">
                                                <label class="label-control">Loại giày</label>
                                                <select name="categorys_id" class="select2 select2-sm form-control form-control-sm">
                                                    <option></option>
                                                    @foreach ($categorys as $category)
                                                        <option {{$category->id == old('categorys_id')?"selected":""}} value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('categorys_id')
                                                    <p class="parsley-errors-list filled" style="font-size: 13px">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 col-lg-6">
                                                <label class="label-control">Đế giày</label>
                                                <select name="soles_id" class="select2 select2-sm form-control form-control-sm">
                                                    <option></option>
                                                    @foreach ($soles as $sole)
                                                        <option {{$sole->id == old('soles_id')?"selected":""}} value="{{ $sole->id }}">{{ $sole->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('soles_id')
                                                    <p class="parsley-errors-list filled" style="font-size: 13px">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-lg-6">
                                                <label class="label-control">Chất liệu</label>
                                                <select name="materials_id" class="select2 select2-sm form-control form-control-sm">
                                                    <option></option>
                                                    @foreach ($materials as $material)
                                                        <option {{$material->id == old('materials_id')?"selected":""}} value="{{ $material->id }}">{{ $material->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('materials_id')
                                                    <p class="parsley-errors-list filled" style="font-size: 13px">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 col-lg-6">
                                                <label class="label-control">Thương hiệu</label>
                                                <select name="trademarks_id" class="select2 select2-sm form-control form-control-sm">
                                                    <option></option>
                                                    @foreach ($trademarks as $trademark)
                                                        <option {{$trademark->id == old('trademarks_id')?"selected":""}} value="{{ $trademark->id }}">{{ $trademark->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('trademarks_id')
                                                    <p class="parsley-errors-list filled" style="font-size: 13px">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12 col-sm-8 col-lg-12">
                                                <label class="label-control">Mô tả sản phẩm</label>
                                                <textarea name="description" class="form-control" id="inputTextarea3" placeholder="Nhập mô tả sản phẩm">{{old('description')}}</textarea>
                                                @error('description')
                                                    <p class="parsley-errors-list filled" style="font-size: 13px">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                                <a id="btnColor" class="btn btn-space btn-warning text-light col-1" data-bs-toggle="modal" data-bs-target="#Color_modal">
                                                                    <i class="icon mdi mdi-plus"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal" id="Color_modal">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div id="formColor">
                                                                            <div class="modal-header d-block">
                                                                                <h3 class="modal-title text-center">Chọn màu sắc</h3>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="m-auto">
                                                                                    <div class="form-group row mx-3">
                                                                                        @foreach ($colors as $color)
                                                                                            <div class="mx-1">
                                                                                                <input type="checkbox" name="{{$color->name}}" value="{{$color->id}}" id="{{$color->color_code}}">
                                                                                                <label onclick="loadColor('{{$color->name}}','{{$color->color_code}}')" style="border: 2px solid {{$color->color_code}};" for="{{$color->color_code}}">
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
                                                                                <a class="btn btn-success text-light" data-bs-toggle="modal" data-bs-target="#Color_add">
                                                                                    Thêm mới
                                                                                </a>
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
                                        {{-- Kích thước --}}
                                        <div class="size">
                                            <div class="form-group row pt-2">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <h4 class="col-2 mr-3"><strong>Kích cỡ : </strong></h4>
                                                        <div class="col align-content-center">
                                                            <div class="row">
                                                                <div class="colorSize col" style="display: flex; gap: 10px">
                                                                    {{-- Hiển thị kích cỡ tại đây --}}
                                                                </div>
                                                                <a id="btnColor" class="btn btn-space btn-warning text-light col-1" data-bs-toggle="modal" data-bs-target="#Size_modal">
                                                                    <i class="icon mdi mdi-plus"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal" id="Size_modal">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div id="formSize">
                                                                            <div class="modal-header d-block">
                                                                                <h3 class="modal-title text-center">Chọn kích cỡ</h3>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="m-auto">
                                                                                    <div class="form-group row mx-3">
                                                                                        @foreach ($sizes as $size)
                                                                                            <div class="mx-1">
                                                                                                <input type="checkbox" name="{{$size->name}}" value="{{$size->id}}" id="size{{$size->size_code}}">
                                                                                                <label onclick="loadSize('{{$size->name}}','{{$size->size_code}}')" style="border: 2px solid black;" for="size{{$size->size_code}}">
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
                                                                                <a class="btn btn-success text-light" data-bs-toggle="modal" data-bs-target="#Size_add">
                                                                                    Thêm mới
                                                                                </a>
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
                        </div>
                    </div>
                    <div id="attribute" class="w-100">
                        {{-- Attributes --}}
                    </div>
                    <div class="col-md-12">
                        <div>
                            <button class="btn btn-space btn-outline-success btn-space" type="submit">
                                <i class="icon icon-left mdi mdi-check"></i>
                                Thêm mới
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <form action="{{ route('color.store') }}" method="post" class="modal" id="Color_add">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="formColor">
                    <div class="modal-header d-block">
                        <h3 class="modal-title text-center">Thêm mới màu sắc</h3>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="mb-3">
                                <label for="name_color">Tên màu sắc</label>
                                <input class="form-control form-control-sm" type="text" name="name" id="name_color" placeholder="Nhập tên màu màu sắc">
                            </div>
                            <div class="mb-3">
                                <label for="exampleColorInput" class="form-label">Màu sắc</label>
                                <input type="color" class="form-control form-control-color form-control-sm" name="color_code" id="color_code" value="#563d7c" title="Chọn màu sắc">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-space btn-danger text-light" data-bs-toggle="modal" data-bs-target="#Color_modal">
                            Hủy
                        </a>
                        <button type="submit" class="btn btn-space btn-success text-light">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="{{ route('size.store') }}" method="post" class="modal" id="Size_add">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div id="formColor">
                    <div class="modal-header d-block">
                        <h3 class="modal-title text-center">Thêm mới size</h3>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="mb-3">
                                <label for="name_color">Tên size</label>
                                <input class="form-control form-control-sm" type="text" name="name" id="name_color" placeholder="Nhập tên kích thước">
                            </div>
                            <div class="mb-3">
                                <label for="size" class="form-label">Kích thước</label>
                                <input class="form-control form-control-sm" type="text" name="size_code" id="size" placeholder="Số kích thước">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-space btn-danger text-light" data-bs-toggle="modal" data-bs-target="#Size_modal">
                            Hủy
                        </a>
                        <button type="submit" class="btn btn-space btn-success text-light">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
        function loadColor(name,color_code) {
            //name màu 
                dataColor.push(name);
                const uniqueSet = new Set(dataColor);//
                const uniqueArr = [...uniqueSet];   //Lọc mảng
                dataColor = uniqueArr;
                localStorage.setItem('dataColor', JSON.stringify(uniqueArr));
            //Mã màu
                dataCode.push(color_code);
                const uniqueCode = new Set(dataCode);
                const uniqueCodeArr = [...uniqueCode];
                localStorage.setItem('dataCode', JSON.stringify(uniqueCodeArr));
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
            listForm();
        }
        function trasColor(index) {
            dataCode.splice(index,1);
            dataColor.splice(index,1);
            if(dataCode.length == 0) {
                let elementColor = "";
                document.querySelector('.colorList').innerHTML = elementColor;
                document.querySelector('#attribute').innerHTML = "";
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
            listForm();
        }
    </script>
    {{-- Kích cỡ --}}
    <script>
        let dataSize = [];
        let dataCodeSize = [];
        function loadSize(name,code_size) {
            dataSize.push(name);
            const uniqueSet = new Set(dataSize);
            const uniqueSize = [...uniqueSet];
            localStorage.setItem('dataSize', JSON.stringify(uniqueSize));
            dataSize = uniqueSize;

            dataCodeSize.push(code_size);
            const uniqueCode = new Set(dataCodeSize);
            const uniqueCodeSize = [...uniqueCode];
            localStorage.setItem('dataCodeSize', JSON.stringify(uniqueCodeSize));
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
            listForm();
        }
        function trasSize(index) {
            dataCodeSize.splice(index,1);
            dataSize.splice(index,1);
            if(dataCodeSize.length == 0) {
                let elementColor = "";
                document.querySelector('.colorSize').innerHTML = elementColor;
                document.querySelector('#attribute').innerHTML = "";
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
            listForm();
        }
    </script>
    {{-- Form attribute --}}
    <script>
        const nameProduct = document.querySelector('#inputSmall');
        const Attribute = document.querySelector('#attribute');
        function listForm() {
            if (dataColor.length != 0 && dataSize.length != 0) {
                console.log(dataColor);
                console.log(dataSize);
                let ElementForm = "";
                dataColor.forEach((element,index) => {
                    ElementForm = ElementForm + `
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="d-flex justify-content-between" style="align-items: center;">
                                        <h4 class="m-0 p-0 text-secondary"><strong>Danh sách sản phẩm màu ${element}</strong></h4>
                                        <button class="btn btn-space btn-outline-warning btn-space">Khôi phục</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body">
                                        <table class="table text-center" id="table1">
                                            <thead>
                                                <tr>
                                                    <th class="in-progress" style="width: 5%;">
                                                        STT
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
                                            <tbody id="bodyForm${index}">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    document.querySelector('#attribute').innerHTML = ElementForm;
                });
                let count = 0;
                dataColor.forEach((element,index) => {
                    let ElementTr = "";
                    dataSize.forEach((e,i) => {
                        count++
                    let anhTd = "";
                    if(i == 0) {
                        anhTd = `<td class="anh" rowspan="${dataSize.length}">
                                <div>
                                    <div class="image-preview${index}"></div>
                                    <label for="Image${index}" class="custom-file-upload">
                                        <i class="mdi mdi-collection-image-o"></i> Ảnh(3)
                                    </label>
                                    <input onchange="loadIMG(${index})" type="file" id="Image${index}" name="image[${index}][]" multiple style="display: none;" accept="image/*"/>
                                </div>
                            </td>`;
                    }else{
                        anhTd = "";
                    }
                    ElementTr = ElementTr + `
                        <tr class="odd gradeX">
                            <td class="ckb">${i+1}
                                <input type="hidden" value="${e}" name="attributes[${count}][size_code]">
                                <input type="hidden" value="${element}" name="attributes[${count}][color_code]">
                            </td>
                            <td class="sanPham">${nameProduct.value}</td>
                            <td class="kichCo">1</td>
                            <td class="canNang"><input name="attributes[${count}][weight]" class="form-control input-smail" value="500"  type="text"></td>
                            <td class="soLuong"><input name="attributes[${count}][quanlity]" class="form-control input-smail" value="100"  type="text"></td>
                            <td class="gia"><input name="attributes[${count}][price]" class="form-control input-smail" value="100000"  type="text"></td>
                            <td class="xoa"><i style="font-size: 16px;" class="mdi mdi-delete"></i></td>
                            ${anhTd}
                        </tr>
                    `;
                });
                    document.querySelector(`#bodyForm${index}`).innerHTML = ElementTr;
                });
            }
            else {
                console.log("Thiếu dữ liệu");///////////
            }
        }        
        listForm();
    </script>
    {{-- Hiển thị ảnh --}}
    <script>
        function loadIMG(index) {
            const img = document.querySelector(`#Image${index}`);
            const preview = document.querySelector(`.image-preview${index}`);
            const file = this.files;
            console.log(file);
            
        }
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
