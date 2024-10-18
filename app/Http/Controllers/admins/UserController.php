<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['users'] = User::query()->where('role','=','Khách hàng')->get();
        return view('admins.accounts.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.accounts.users.create');
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
        $data['user'] = User::query()->findOrFail($id);
        if($data['user']) {
            return view('admins.accounts.users.detail',$data);
        }
        abort(404);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $data['user'] = User::query()->findOrFail($id);
        if($data['user']) {
            return view('admins.accounts.users.detail',$data);
        }
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if($request->isMethod('PUT')) {
            $user = User::query()->findOrFail($id);
            //Thêm mới địa chỉ
            if($request->input('create-location')) {
                $data = $request->only('location_name','user_name','phone_number','city_province','district','commune','location_detail');
                $check = true;
                foreach ($data as $key => $value) {
                    if($value == null) {
                        $check = false;
                    }
                }
                if($check) {
                    if($user->location()->count('id')==0) {
                        $data['status'] = 1;//Đặt làm mặc định
                    }
                    else {
                        $data['status'] = 0;
                    }
                    $new_location = $user->location()->create($data);
                    if($new_location) {
                        return back()->with('success', 'Thêm địa chỉ thành công!');
                    }
                }
                else {
                    return back()->with('error', 'Thêm địa chỉ thất bại!');
                }
            }
            if($request->input('user-update')) {
                $data = $request->only('name', 'email', 'phone_number', 'birthday', 'gender', 'role', 'status');
                if($request->hasFile('image')) {
                    if($user->image) {
                        Storage::disk('public')->delete($user->image);
                    }
                    $data['image'] = $request->file('image')->store('uploads/userImage', 'public');
                }
                else {
                    $data['image'] = $user->image;
                }
                $check = true;
                if($data['name'] == null || $data['email'] == null || $data['phone_number'] == null || $data['gender'] == null || $data['status'] == null || $data['role'] == null) {
                    $check = false;
                }
                if($check) {
                    $user_update = User::query()->findOrFail($id)->update($data);
                    if($user_update) {
                        return back()->with('success', 'Sửa thành công!');
                    }
                    else {
                        return back()->with('warning', 'Sửa thất bại!');
                    }
                }
                else {
                    return back()->with('error', 'Sửa thất bại!');
                }
            }
        }
        else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
