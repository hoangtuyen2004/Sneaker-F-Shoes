<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    //
    public function index(String $id) {
        $data['products'] = Product::query()->with(['categorys','soles', 'materials', 'trademarks'])->orderBy('id','desc')->where('trademarks_id', '=', $id)->get();
        $data['categorys'] = Category::query()->get();
        $data['trademarks'] = Trademark::query()->get();
        $data['max_price'] = Attribute::query()->max('price');
        $data['min_price'] = Attribute::query()->min('price');
        $data['sizes'] = Size::query()->get();
        $data['colors'] = Color::query()->get();
        return view('clients.shop.index', $data);
    }
}
