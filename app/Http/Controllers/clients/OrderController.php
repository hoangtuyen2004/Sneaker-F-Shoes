<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Cart;
use App\Models\Location;
use App\Models\Order;
use App\Models\Status;
use App\Models\Status_order;
use DateTime;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class OrderController extends Controller
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
        if(Auth::user()) {
            $data['carts'] = Auth::user()->cart;
            $data['location'] = Location::query()->where('user_id', '=', Auth::user()->id)->where('status', '=', 1)->first();
            foreach ($data['carts'] as $cart) {
                $data['subTotal'] = $cart->attributes->price * $cart->quanlity;
                $data['total'] = $data['subTotal'] - $data['voucher'];
            }
        }
        else {
            if(session()->get('cart') == "") {
                return back();
            }
            $data['carts'] = session()->get('cart');
            foreach ($data['carts'] as $key =>$item) {
                $data['subTotal'] += ($item['price'] * $item['quantity']);
                $data['total'] = $data['subTotal'] - $data['voucher'];
            }
        }
        $data['attributes'] = Attribute::query()->get();
        return view('clients.order.index',$data);
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
        if($request->isMethod('POST')) {
            if($request->input('payment_method') == "COD") {
                $data = $request->only('recipient_name','phone_number','city','district','commune','location_description');
                $data['order_code'] =  "HD".Order::max('id').Str::random(8);
                if(!Auth::user()) {
                    $cart = session()->get('cart', []);
                }
                else {
                    $cart = Cart::query()->where('users_id', '=', Auth::user()->id)->get();
                }
                if($request->input('voucher')) {
                    dd($request->input('voucher'));
                }
                else {
                    $data['coupons_value'] = 0;
                }
                $data['order_type'] = "Đơn online";
                $data['payment_method'] = "Thanh toán khi nhận hàng";
                $data['total'] = 0;
                $data['coin'] = 0;
                if(!Auth::user()) {
                    foreach ($cart as $key => $item) {
                        $data['total'] += ($item['price'] * $item['quantity']);
                        $data['coin'] = $data['total'] - $data['coupons_value'];
                    }
                }
                else {
                    foreach (Auth::user()->cart as $cart) {
                        $data['total'] += ($cart->attributes->price * $cart->quanlity);
                        $data['coin'] = $data['total'] - $data['coupons_value'];
                    }
                }
                if(!Auth::user()) {
                    $order = Order::query()->create($data);
                }
                else {
                    $order = Auth::user()->orders()->create($data);
                }
                // Danh sách sản phẩm
                if(!Auth::user()) {
                    $attbutes = Attribute::query()->get();
                    foreach ($attbutes as $attbute) {
                        foreach ($cart as $item) {
                            if($attbute->id == $item['attribute_id']) {
                                $atr = [
                                    'attributes_id' => $attbute->id,
                                    'product_name' => $attbute->product->name,
                                    'color_name' => $attbute->colors->name,
                                    'size_name' => $attbute->sizes->name,
                                    'price' => $attbute->price,
                                    'quanlity' => $item['quantity'],
                                    'coin' => ($attbute->price*$item['quantity']),
                                ];
                                $order->product_lists()->create($atr);
                            }
                        }
                    }
                }
                else {
                    foreach (Auth::user()->cart as $cart) {
                        $atr = [
                            'attributes_id' => $cart->attributes->id,
                            'product_name' => $cart->attributes->product->name,
                            'color_name' => $cart->attributes->colors->name,
                            'size_name' => $cart->attributes->sizes->name,
                            'price' => $cart->attributes->price,
                            'quanlity' => $cart->quanlity,
                            'coin' => ($cart->attributes->price*$cart->quanlity),
                        ];
                        $order->product_lists()->create($atr);
                        $cart->delete();
                    }
                }
                // Trạng thái
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $txm = [
                    'statuses_id' => 1,
                    'name_status' => "Chờ xử lý",
                    'date_update' => date('Y-m-d H:i:s'),
                    'note' => "Chờ được sử lý",
                ];
                $order->status_orders()->create($txm);
                
                return view('clients.order.success', compact('order'));
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data['order'] = Order::findOrFail($id);
        return view('clients.auth.detail',$data);
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
        $order = Order::query()->where('users_id', '=', Auth::user()->id)->find($id);
        $status = Status::query()->where('name', '=', "Đã hủy")->first();
        $data = [
            "statuses_id"=>$status->id,
            "name_status"=>$status->name,
            "date_update"=>date('Y-m-d H:i:s'),
            "note"=>"Bạn đã hủy đơn",
            "orders_id"=>$order->id,
            "users_id"=>Auth::user()->id,
        ];
        Status_order::query()->create($data);
        return response()->json(
            [
                'status'=>200,
                'message'=>'Hủy đơn thành công'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        abort(404);
    }
}
