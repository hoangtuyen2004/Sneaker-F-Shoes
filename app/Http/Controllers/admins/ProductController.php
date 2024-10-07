<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Material;
use App\Models\Product;
use App\Models\Size;
use App\Models\Sole;
use App\Models\Trademark;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * 
         */
        $data['products'] = Product::query()->with(['categorys','soles', 'materials', 'trademarks'])->get();
        return view('admins.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $data['categorys'] = Category::all();
        $data['soles'] = Sole::all();
        $data['materials'] = Material::all();
        $data['trademarks'] = Trademark::all();
        return view('admins.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->isMethod('POST')) {
           
            $product = $request->only('name','categorys_id','soles_id','materials_id','trademarks_id','description');
            $product['status'] = "Đang bán";
            $new_product = Product::query()->create($product);
            $attributes = $request->input('attributes');
            foreach ($attributes as $attribute) {
                $attribute['sizes_id'] = $request[$attribute['size_code']];
                $attribute['colors_id'] = $request[$attribute['color_code']];
                $new_attribute = $new_product->attribute()->create($attribute);
                $files = $request->file('image');
                foreach ($files as $file) {
                    foreach ($file as $i) {
                        $img['url'] = $i->store('uploads/productImg', 'public');
                        $new_attribute->url_image()->create($img);
                    }
                }
            }
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Request $request, string $id)
    {
        //
        if($request->isMethod('DELETE')) {
            $product = Product::query()->findOrFail($id);
            $product->delete();
            return redirect()->route('product.index')->with('warning','Xóa thành công sản phẩm '.$product->name);
        }
    }
}
