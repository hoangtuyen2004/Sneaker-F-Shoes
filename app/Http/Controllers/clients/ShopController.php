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

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['products'] = Product::query()->with(['categorys','soles', 'materials', 'trademarks'])->orderBy('id','desc')->limit(10)->get();
        $data['categorys'] = Category::query()->get();
        $data['trademarks'] = Trademark::query()->get();
        $data['max_price'] = Attribute::query()->max('price');
        $data['min_price'] = Attribute::query()->min('price');
        $data['sizes'] = Size::query()->get();
        $data['colors'] = Color::query()->get();
        return view('clients.shop.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data['product'] = Product::query()->findOrFail($id);
        $data['products'] = Product::query()->where('categorys_id', '=', $data['product']->categorys_id)->get();
        $data['sizes'] = Size::query()->get();
        $data['colors'] = Color::query()->get();
        return view('clients.shop.detail',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
