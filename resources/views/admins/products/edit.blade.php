@extends('layouts.admins')
@section('title')
    Chỉnh sửa sản phẩm "{{ $product->name }}"
@endsection
@section('css')
    {{-- CSS --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admins/lib/bootstrap-slider/css/bootstrap-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admins/css/app.css') }}" type="text/css">
    

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admins/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admins/lib/material-design-icons/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admins/lib/jquery.gritter/css/jquery.gritter.css') }}">
    <style>
        .title {
            font-size: 14px;
            font-weight: 500;
            color: #000000;
        }

        .card {
            border: 1px solid #c3c4c7;
        }

        .card-body {
            border-top: 1px solid #c3c4c7;
        }

        .center {
            align-content: center;
            text-align: center;
            /* width: 75%;
                margin: auto; */
        }

        .nav-link-a.active {
            border-radius: 0px !important;
            color: #555;
            background-color: #eee !important;
        }

        li.active a {
            color: #555;
            position: relative;
            background-color: #eee;
        }

        .nav {
            background-color: #fafafa;
        }

        .nav .nav-a {
            border-bottom: 1px solid #c3c4c7;
        }

        .nav-tabs-classic {
            border-right: 1px solid #c3c4c7;
        }

        .nav-a a {
            margin: 0;
            padding: 10px;
            display: block;
            box-shadow: none;
            text-decoration: none;
            line-height: 20px !important;
            border-bottom: 1px solid #eee;
        }
    </style>
    <style>
        #action {
            padding: 8px 20px 8px 20px;
            clear: both;
            border-top: 1px solid #dcdcde;
            background: #f6f7f7;
        }

        #back {
            color: #2271b1;
            transition-property: border, background, color;
            transition-duration: .05s;
            transition-timing-function: ease-in-out;
        }

        #delete {
            color: #b32d2e !important;
            transition-property: border, background, color;
            transition-duration: .05s;
            transition-timing-function: ease-in-out;
        }

        #update {
            text-align: right;
            line-height: 1.9;
        }

        #DU {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }
        .colImg {
            padding: 0px 10px;
            position: relative;
        }

        .miniImg {
            width: 100%;
            height: auto;
            max-height: 90px;
            object-fit: cover;
        }
        .checkImg {
            position: absolute;
            width: 15px;
            height: 15px;
            margin-top: 4px;
            margin-left: 66%;
        }
        .lihgi {
            background: #fff;
            border-bottom: 1px solid #eee !important;
            margin: 0 !important;
            gap: 10px;
            align-items: baseline;
            cursor: pointer;
            padding: .5em .75em .5em 1em !important;
        }
        .labelAttribute {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }
        .image {
            max-width: 128px;
            max-height: 128px;
        }
    </style>
@endsection
@section('content')
    <div class="be-content">
        <div class="row">
            <div class="page-head col">
                <h2 class="page-head-title">Chỉnh sửa sản phẩm</h2>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb page-head-nav">
                        <li class="breadcrumb-item">
                            <a href="#">Quản lý sản phẩm</a>
                        </li>
                        <li class="breadcrumb-item active">Sản phẩm</li>
                        <li class="breadcrumb-item active">Chỉnh sửa</li>
                    </ol>
                </nav>
            </div>
            <div class="col-4 p-3">
                @if (session('success'))
                    <div id="successAlert" class="alert alert-success alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close"
                                aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{ session('success') }}</div>
                    </div>
                @elseif (session('danger'))
                    <div id="dangerAlert" class="alert alert-danger alert-dismissible" role="alert">
                        <a class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="mdi mdi-close"
                                aria-hidden="true"></span></a>
                        <div class="icon"><span class="mdi mdi-check"></span></div>
                        <div class="message"><strong>Thông báo!</strong> {{ session('danger') }}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="main-content container-fluid">
            <form action="{{ route('wp-admin.product.update', $product->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex align-items-center" style="gap: 20px;">
                            <h1 class="m-0" style="font-size: 20px;font-weight: 400;">Chỉnh sửa sản phẩm</h1>
                            <button class="m-0 btn btn-space btn-outline-info btn-space">Thêm mới</button>
                        </div>
                        <div class="space" style="margin: 30px;"></div>
                        <div class="product">
                            <div class="row">
                                <div class="col-9">
                                    <div class="product-name">
                                        <input class="form-control form-control-sm" type="text" value="{{ $product->name }}" name="name" id="">
                                    </div>
                                    <div class="space" style="margin: 20px"></div>
                                    {{-- Mo ta --}}
                                    <div class="card">
                                        <div class="card-header" style="padding:8px 0px;">
                                            <label class="label-control title m-0" for="description">Mô tả</label>
                                        </div>
                                        <div class="card-body pt-3">
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                    {{-- Thẻ --}}
                                    <div class="card">
                                        <div class="card-header" style="padding:8px 0px;">
                                            <p class="label-control title m-0">Thẻ sản phẩm</p>
                                        </div>
                                        <div class="card-body pt-3">
                                            {{-- ĐẾ GIÀY --}}
                                            <div class="row mb-3 mx-5">
                                                <div class="col-3"><label
                                                        class="form-label form-control form-control-sm center"
                                                        for="sole">Đế giày</label></div>
                                                <div class="col-9">
                                                    <select name="soles_id" id="sole"
                                                        class="select2 select2-sm form-control form-control-sm">
                                                        <option></option>
                                                        @foreach ($soles as $sole)
                                                            <option {{ $product->soles_id == $sole->id ? 'selected' : '' }}
                                                                value="{{ $sole->id }}">{{ $sole->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- LOẠI GIÀY --}}
                                            <div class="row mb-3 mx-5">
                                                <div class="col-3"><label
                                                        class="form-label form-control form-control-sm center"
                                                        for="category">Loại giày</label></div>
                                                <div class="col-9">
                                                    <select name="categorys_id" id="category"
                                                        class="select2 select2-sm form-control form-control-sm">
                                                        <option></option>
                                                        @foreach ($categorys as $category)
                                                            <option
                                                                {{ $product->categorys_id == $category->id ? 'selected' : '' }}
                                                                value="{{ $category->id }}">{{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- CHẤT LIỆU --}}
                                            <div class="row mb-3 mx-5">
                                                <div class="col-3"><label
                                                        class="form-label form-control form-control-sm center"
                                                        for="material">Chất liệu</label></div>
                                                <div class="col-9">
                                                    <select name="materials_id" id="material"
                                                        class="select2 select2-sm form-control form-control-sm">
                                                        <option></option>
                                                        @foreach ($materials as $material)
                                                            <option
                                                                {{ $product->materials_id == $material->id ? 'selected' : '' }}
                                                                value="{{ $material->id }}">{{ $material->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- THƯƠNG HIỆU --}}
                                            <div class="row mb-3 mx-5">
                                                <div class="col-3"><label
                                                        class="form-label form-control form-control-sm center"
                                                        for="trademark">Thương hiệu</label></div>
                                                <div class="col-9">
                                                    <select name="trademarks_id" id="trademark"
                                                        class="select2 select2-sm form-control form-control-sm">
                                                        <option></option>
                                                        @foreach ($trademarks as $trademark)
                                                            <option
                                                                {{ $product->trademarks_id == $trademark->id ? 'selected' : '' }}
                                                                value="{{ $trademark->id }}">{{ $trademark->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Biến thể --}}
                                    <div class="card">
                                        <div class="card-header" style="padding:8px 0px;">
                                            <p class="label-control title m-0">Biến thể</p>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="tab-container m-0 tab-left row">
                                                <ul class="nav nav-tabs nav-tabs-classic col-3 p-0" role="tablist">
                                                    <li class="nav-a">
                                                        <a class="nav-link-a active" href="#icon1" data-toggle="tab" role="tab"><i class="icon mdi mdi-border-all"></i> Biến thể</a>
                                                    </li>
                                                    <li class="nav-a">
                                                        <a class="nav-link-a" href="#icon2" data-toggle="tab" role="tab"><i class="icon mdi mdi-layers"></i> Thuộc tính</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content col-9" style="padding: 10px">
                                                    <div class="tab-pane active" id="icon1" role="tabpanel">
                                                        <div class="lihgi">
                                                            <button type="button" class="btn m-0 btn-space btn-outline-info btn-space">Tạo các biến thể</button>
                                                            <button type="button" class="btn m-0 btn-space btn-outline-info btn-space">Thêm biến thể</button>
                                                        </div>
                                                        <div>
                                                            <div class="accordion" id="accordion">
                                                                @foreach ($product->attribute as $key=>$attribute)
                                                                    <div class="">
                                                                        <div class="" id="heading{{$key}}">
                                                                            <div class="btn d-flex lihgi" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                                                                    <h5><strong style="font-weight: 500;">#{{$attribute->id}}</strong></h5>
                                                                                    <input type="hidden" name="attribute[{{$key}}][id]" value="{{$attribute->id}}" readonly>
                                                                                    <select class="form-control form-control-sm" style="width: 15%;" name="attribute[{{$key}}][colors_id]" readonly>
                                                                                        <option value="{{ $attribute->colors->id }}">{{ $attribute->colors->name }}</option>
                                                                                    </select>
                                                                                    <select class="form-control form-control-sm" style="width: 15%;" name="attribute[{{$key}}][sizes_id]" readonly>
                                                                                        <option value="{{ $attribute->sizes->id }}">{{ $attribute->sizes->name }}</option>
                                                                                    </select>
                                                                                <div class="w-100" style="text-align: end;gap: 10px;">
                                                                                    <a id="delete" >Xóa</a>
                                                                                    <a class="ml-3 a">Sửa</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="collapse" id="collapse{{$key}}" aria-labelledby="heading{{$key}}" data-parent="#accordion">
                                                                            <div class="p-3 row">
                                                                                <div class="d-flex" style="gap: 10px">
                                                                                    @foreach ($attribute->url_image as $i => $img)
                                                                                        <div class="colImg">
                                                                                            <input style="margin-left:108px;" class="checkImg" type="checkbox" name="image['attribute'][]" id="IM{{$i}}">
                                                                                            <label class="w-100" for="IM{{$i}}">
                                                                                                <img class="d-block image" src="{{ Storage::url($img->url) }}" alt="">
                                                                                            </label>
                                                                                        </div>
                                                                                    @endforeach
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button class="btn btn-space btn-outline-danger btn-space" type="button">Xóa ảnh</button>
                                                                                    <button class="btn btn-space btn-outline-success" type="button">Thêm ảnh</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="lihgi d-flex">
                                                                                <div class="row m-0 p-0" style="align-items: baseline;">
                                                                                    <label class="col-5" for="quanlity">Số lượng:</label>
                                                                                    <input class="col" type="number" style="width: 60%;" min="0" value="{{$attribute->quanlity}}" name="attribute[{{$key}}][quanlity]" id="quanlity">
                                                                                </div>
                                                                                <div class="row m-0 p-0" style="align-items: baseline;">
                                                                                    <label class="col-5" for="weight">Cân nặng:</label>
                                                                                    <input class="col" type="number" style="width: 60%;" min="0" value="{{$attribute->weight}}" name="attribute[{{$key}}][weight]" id="weight">
                                                                                </div>
                                                                                <div class="row m-0 p-0" style="align-items: baseline;">
                                                                                    <label class="col-5" for="price">Giá:</label>
                                                                                    <input class="col" type="number" style="width: 60%;" min="0" value="{{$attribute->price}}" name="attribute[{{$key}}][price]" id="price">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                      </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="icon2" role="tabpanel">
                                                        <label class="label-control labelAttribute" for=""><strong class="">Màu sắc:</strong><button class="btn m-0 btn-space btn-outline-info btn-space" type="button">Thêm biến thể</button></label>
                                                        <table class="table table-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Tên màu</th>
                                                                    <th>Mã màu</th>
                                                                    <th>Hành động</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($colors as $key => $color)
                                                                    <tr>
                                                                        <td>{{$key+1}}</td>
                                                                        <td>{{$color->name}}</td>
                                                                        <td class="w-25">
                                                                            <div class="text-center row" style="border:1px solid {{$color->color_code}};color:{{$color->color_code}};">
                                                                                <strong class="col">{{$color->color_code}}</strong>
                                                                                <div class="col" style="background-color:{{$color->color_code}};"></div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a class="text-secondary" style="font-size: 18px;" href="" title="Sửa thông tin màu sắc"><i class="icon mdi mdi-delete"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <label class="label-control labelAttribute" for=""><strong class="">Kích thước:</strong><button class="btn m-0 btn-space btn-outline-info btn-space" type="button">Thêm biến thể</button></label>
                                                        <table class="table table-sm table-striped text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Tên size</th>
                                                                    <th>Mã size</th>
                                                                    <th>Hành động</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($sizes as $key => $size)
                                                                    <tr>
                                                                        <td>{{$key+1}}</td>
                                                                        <td>{{$size->name}}</td>
                                                                        <td class="w-25">
                                                                            <div class="text-center row" style="border:1px solid black;">
                                                                                <strong class="col">{{$size->size_code}}</strong>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a class="text-secondary" style="font-size: 18px;" href="" title="Sửa thông tin màu sắc"><i class="icon mdi mdi-delete"></i></a>
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
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-header m-0" style="padding: 5px 12px;">
                                            <span style="font-size: 14px;font-weight: 500;">CẬP NHẬT</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="" style="text-align: end;">
                                                <a href="{{ route('wp-admin.product.show',$product->id) }}" class="btn btn-space btn-outline-primary btn-space w-25">Xem <i class="icon mdi mdi-eye"></i></a>
                                            </div>
                                            <div>
                                                <p class="text-secondary"><i class="icon pr-3 mdi mdi-my-location"></i>
                                                    Trạng thái: <span
                                                        class="{{ $product->status == 'Đang bán' ? 'text-success' : 'text-warning' }}">
                                                        <strong>{{ $product->status }}</strong>
                                                    </span> <a href="#" style="text-decoration: underline;">Sửa</a>
                                                </p>
                                                <p class="text-secondary"><i class="icon pr-3 mdi mdi-calendar-check"></i>
                                                    Ngày nhập: <span class="text-dark">
                                                        <strong>{{ $product->created_at }}</strong>
                                                    </span>
                                                </p>
                                                <p class="text-secondary"><i class="icon pr-3 mdi mdi-cloud-upload"></i>
                                                    Cập nhập gần nhất: <span class="text-dark">
                                                        <strong>{{ $product->updated_at }}</strong>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div style="border-top: 1px solid #dcdcde;background-color: #F6F7F7;">
                                            <div id="action" class="card-footer" style="background: none;">
                                                <div><a class="d-block mb-1" id="back" href="{{ route('wp-admin.product.index') }}">Hủy thay
                                                        đổi</a></div>
                                                <div id="DU">
                                                    <div><a class="d-block mb-1" id="delete" href="">Xóa sản
                                                            phẩm này</a></div>
                                                    <div id="update"><button class="btn btn-info">Cập nhật</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header m-0" style="padding: 5px 12px;">
                                            <span style="font-size: 14px;font-weight: 500;">ẢNH SẢN PHẨM</span>
                                        </div>
                                        <div class="card-body" style="padding: 8px 10px">
                                            <div class="row p-0 m-0">
                                                @foreach ($product->attribute as $attribute)
                                                @foreach ($attribute->url_image as $key => $img)
                                                    <div class="col-4 colImg">
                                                        <input class="checkImg" type="checkbox" name="image.id" id="Anh{{$key}}">
                                                        <label class="w-100" for="Anh{{$key}}">
                                                            <img class="d-block miniImg" src="{{ Storage::url($img->url) }}" alt="">
                                                        </label>
                                                    </div>
                                                @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-footer" style="border-top: 1px solid #c3c4c7;">
                                            <div style="text-align: end;">
                                                <button class="btn btn-space btn-outline-danger btn-space">Xóa ảnh</button>
                                                <button class="btn btn-space btn-outline-success">Thêm ảnh</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                const alert = document.querySelector('.alert');
                alert.style.display = "none";
            }, 5000);
        });
    </script>
@endsection
