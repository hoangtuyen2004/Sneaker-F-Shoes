<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Attribute as ModelsAttribute;
use App\Models\Cart;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['total'] = 0;
        $data['subTotal'] = 0;
        $data['voucher'] = 0;
        $data['attributes'] = ModelsAttribute::all();
        if(!Auth::user()) {
            $data['cart'] = session()->get('cart', []);
            foreach ($data['cart'] as $key => $item) {
                $data['subTotal'] += ($item['price'] * $item['quantity']);
                $data['total'] = $data['subTotal'] - $data['voucher'];
            }
        }
        else {
            $data['cart'] = Auth::user()->cart->all();
            foreach ($data['cart'] as $key =>$item) {
                $data['subTotal'] += ($item['price'] * $item['quantity']);
                $data['total'] = $data['subTotal'] - $data['voucher'];
            }
        }
        return view('clients.cart.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $color = Color::query()->where('color_code', $request->input('color_code'))->first();
        $size = Size::query()->where('size_code', $request->input('size_code'))->first();
        $product = Product::query()->findOrFail($request->input('id'));
        $attribute = $product->attribute()->where('colors_id', '=', $color->id)->where('sizes_id', '=', $size->id)->first();//Sản phẩm được add
        $quantity = $request->input('quantity');
        if(!$quantity) {
            $quantity = 1;
        }
        if(Auth::user()) {
            $carts = Cart::where('users_id', '=', Auth::user())->orwhere('attributes_id', '=', $attribute->id)->first();
            if($carts) {
                // Sản phẩm đã có trong giỏ hàng
               $data['quanlity'] = $carts->quanlity+$quantity;
               $carts->update($data);
            }
            else {
                Cart::query()->create([
                    'users_id'=>Auth::user()->id,
                    'attributes_id'=>$attribute->id,
                    'quanlity'=>$quantity,
                ]);
            }
            return back();
        }
        else {
            $cart = session()->get('cart',[]);
            if(isset($cart[$attribute->id])) {
                // Sản phẩm đã tồn tại
                $cart[$attribute->id]['quantity'] += $quantity;
            }
            else {
                // Sản phẩm chưa có 
                $cart[$attribute->id] = [
                    'attribute_id' => $attribute->id,
                    'name' => $product->name,
                    'color' => $color->name,
                    'size' => $size->name,
                    'quantity' => $quantity,
                    'price' => $attribute->price,
                ];
                foreach ($attribute->url_image as $key=>$img) {
                    $cart[$attribute->id]['img'][$key] = $img->url;
                }
            }
            session()->put('cart',$cart);
            return back()->with('success', "Thêm giỏ thành công!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if(!Auth::user()) {
            $cart = session()->get('cart');
            $cart[$id]['quantity'] = $request->input('quantity');
            session()->put('cart',$cart);
            return back();
        }
        else {
            $cart = Cart::query()->findOrFail($id);
            dd($cart);
            $quantity = $cart->quanlity;
            $data = ['quanlity'=>$quantity];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        try {
            if ($request->isMethod('DELETE')) {
                if(Auth::user()) {
                    $cart = Cart::query()->findOrFail($id);
                    $cart->delete();
                    $data['cart'] = Auth::user()->cart->all();
                    foreach ($data['cart'] as $key =>$item) {
                        $data['subTotal'] += $item['price'] * $item['quantity'];
                        $data['total'] = $data['subTotal'] - $data['voucher'];
                        $data['message'] = "Xóa thành công!";
                    }
                    return back();
                }
                else {
                    if($request->only('delete_Pr')) {
                        $cart = session()->get('cart');
                        $attribute_id = $id;
                
                        $cart = collect($cart)->reject(function ($item) use ($attribute_id) {
                            return $item['attribute_id'] == $attribute_id;
                        })->toArray();
                        session()->put('cart', $cart);
                        return back()->with('Xóa sản phẩm thành công!');
                    }
                }
            }
        } catch (\Throwable $th) {
            abort(404);
        }
    }
}
