<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Status;
use App\Models\Status_order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['orders'] = Order::query()->orderBy('id', 'desc')->paginate(10);
        return view('admins.orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        dd("Đâu là trang create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd("Đâu là trang thêm mới");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data['order'] = Order::query()->findOrFail($id);
        return view('admins.orders.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        dd("Đâu là trang sửa");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $order = Order::query()->findOrFail($id);

        // Sửa trạng thái
        if($request->input('btn_DXN')) {
                $validator = Validator::make($request->all(), 
                [
                    'name_status'=>'required',
                    'note'=>'required',
                    ],
            [
                    'name_status.required'=>'Tên trang thái bị trống',
                    'note.required'=>'Ghi chú bị trống',
                    ]
                );
                if($validator->fails()) 
                {
                    return response()->json([
                        'status'=>400,
                        'errors'=>$validator->messages(),
                    ]);
                }else 
                {
                    $status = Status::query()->where('name', '=', $request->input('name_status'))->first();
                    $data = [
                        'statuses_id'=>$status->id,
                        'name_status'=>$request->input('name_status'),
                        'date_update'=>date('Y-m-d H:i:s'),
                        'note'=>$request->input('note'),
                        'users_id'=> Auth::user()->id,
                        'orders_id'=> $id,
                    ];
                    // $order->status_orders->create($data);
                    Status_order::query()->create($data);
                    return response()->json([
                        'status'=>200,
                        'message'=>'Cập nhật trạng thái thành công'
                    ]);
                }
        }
        if($request->input('payment')) {
            $validator = Validator::make($request->all(), 
                [
                    'amount' => 'required|numeric',
                ],
                [
                    'amount.required' => 'Số tiền không thể bỏ trống!',
                    'amount.numeric' => 'Số tiền không hợp lệ!',
                ]
            );
            if($validator->fails()) 
                {
                    return response()->json([
                        'status'=>400,
                        'errors'=>$validator->messages(),
                    ]);
            } else 
            {
                $data = [
                    'orders_id'=>$id,
                    'amount'=>$request->input('amount'),
                    'trading'=>$request->input('trading'),
                    'payment_method'=>$request->input('payment_method'),
                    'note'=>$request->input('note'),
                    'users_id'=>Auth::user()->id,
                ];
                Payment::query()->create($data);
                return response()->json([
                    'status'=>200,
                    'message'=>'Cập nhật thanh toán thành công',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dd("Đâu là trang xóa");
    }
}
