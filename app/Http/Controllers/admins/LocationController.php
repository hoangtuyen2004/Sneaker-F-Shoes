<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function update(Request $request, string $id) {
        if($request->isMethod('PUT')) {
            $location = Location::query()->findOrFail($id);
            if($request->only('up-nomal')) {
                $locations = Location::query()->where('user_id', '=', $location->user_id)->get();
                foreach ($locations as $key => $location) {
                    $data['status'] = 0;
                    $location->update($data);
                }
                $data['status'] = 1;
                $location_update = Location::query()->findOrFail($id)->update($data);
                if($location_update) {
                    return back()->with('success', 'Sửa thành công!');
                }
                return back()->with('error', 'Sửa thất bại');
            }
            if($request->only('location-update')) {
                $data = $request->only('location_name', 'user_name', 'phone_number', 'city_province', 'district', 'commune', 'location_detail');
                $check = true;
                foreach ($data as $key => $value) {
                    if($value == null) {
                        $check = false;
                    }
                }
                if($check) {
                    Location::query()->findOrFail($id)->update($data);
                    return back()->with('success', 'Sửa địa chỉ thành công!');
                }
                else {
                    return back()->with('error', 'Sửa địa chỉ thất bại!');
                }
            }
        }
    }
    public function destroy(Request $request, string $id) {
        if($request->isMethod('DELETE')) {
            $location = Location::query()->findOrFail($id);
            if($location->status == 0) {
                $locations = Location::query()->where('user_id', '=', $location->user_id)->get();
                foreach ($locations as $key => $location) {
                    $data['status'] = 0;
                    $location->update($data);
                    if($location->id == $locations->min('id')) {
                        $data['status'] = 1;
                        $location->update($data);
                    }
                }
            }
            $location_delete = $location->delete();
            if($location_delete) {
                return back()->with('success', 'Xóa địa chỉ thành công!');
            }
            else {
                return back()->with('danger', 'Xóa địa chỉ Thất bại!');
            }
        }
        else {
            abort(403);
        }
    }
}
