<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //
    public function index() {
        /**
         * 
         */
        return view('clients.auth.index');
    }
    public function update(Request $request, string $id) {
        $user = User::query()->findOrFail($id);
        $validator = Validator::make($request->all(), 
        [
            'name'=>'required|string',
            'email'=>'required|email',
            'phone_number'=>'required|max:20',
            'gender'=>'required',
        ],
        [
            'name.required'=>'Tên không thể bỏ trống',
            'name.string'=>'Tên không hợp lệ',
            'email.required'=>'Email không thể bỏ trống',
            'email.email'=>'Email không hợp lệ',
            'phone_number.required'=>'Số điện thoại không thể bỏ trống',
            'phone_number.max'=>'Số điện thoại quá dài',
            'gender.required'=>'Giới tính không thể bỏ trống',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else {
            $data = [
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone_number'=>$request->input('phone_number'),
                'gender'=>$request->input('gender'),
                'birthday'=>$request->input('birthday'),
            ];
            if($request->hasFile('img_file')) {
                $data['image'] = $request->file('img_file')->store('uploads/userImage', 'public');
            }
            $user->update($data);
            return response()->json([
                'status'=>200,
                'message'=>'Lưu thành công',
            ]);
        }
    }
}
