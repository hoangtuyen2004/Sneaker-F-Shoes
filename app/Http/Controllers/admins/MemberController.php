<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\account\MemberCreate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['members'] = User::query()->where('role','=','Quản lý')
        ->orWhere('role','=','Nhân viên')
        ->orderBy('id','desc')->get();
        return view('admins.accounts.members.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admins.accounts.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MemberCreate $request)
    {
        //
        try {
            if($request->isMethod('POST')) {
               
                $user = $request->only('name', 'email', 'phone_number', 'birthday', 'gender', 'role', 'password');
                $user['user_code'] = "NV_". User::query()->max('id')+1;
                $user['status'] = "Hoạt động";
                if($request->hasFile('image')) {
                    $user['image'] = $request->file('image')->store('uploads/userImage', 'public');
                }
                $user_new = User::query()->create($user);
                $user = User::query()->find(1);
                $location = $request->input('location');
                $location['status'] = 1;
                $location_new = $user_new->location()->create($location);

                return redirect()->route('wp-admin.member.index')->with('success', 'Thêm mới nhân viên thành công!');
            }
            else {
                abort(403);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('wp-admin.member.index')->with('danger', 'Thêm mới nhân viên thất bại!');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data['member'] = User::query()->findOrFail($id);
        if($data['member']) {
            return view('admins.accounts.members.detail',$data);
        }
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
        try {

            if($request->isMethod('PUT')) {
                $user = User::query()->findOrFail($id);
                if($request->input('location-create')) {
                    $location = $request->only('user_name', 'phone_number', 'city_province', 'district', 'commune', 'location_detail');
                    $location['location_name'] = "Thông tin liên hệ";
                    $location['status'] = 1;
                    $location_new = $user->location()->create($location);
                    return back()->with('success', 'Cập nhật thông tin thành công!');
                }
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
                $user_update = $user->update($data);
                return redirect()->route('wp-admin.member.index')->with('success', 'Sửa thành công!');
            }
        } catch (\Throwable $th) {
            abort(404);
            dd($th);
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
