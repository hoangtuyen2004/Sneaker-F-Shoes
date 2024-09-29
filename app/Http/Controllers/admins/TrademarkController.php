<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrademarkRequest;
use App\Models\Trademark;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['trademarks'] = Trademark::query()->orderBy('id', 'desc')->paginate(10);
        return view('admins.trademarks.index',$data);
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
    public function store(TrademarkRequest $request)
    {
        //
        if($request->isMethod('POST')) {
            $data = $request->only('name');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data['date_create'] = date('Y-m-d H:i:s');
            $trademark_new = Trademark::query()->create($data);
            return redirect()->route('trademark.index')->with('success', 'Thêm mới thành công');
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
        if($request->isMethod('PUT')) {
            $data = $request->only('name');
            $trademark = Trademark::query()->findOrFail($id);
            $trademark->update($data);
            return redirect()->route('trademark.index')->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        if($request->isMethod('DELETE')) {
            $trademark = Trademark::query()->findOrFail($id);
            $trademark->delete();
            return redirect()->route('trademark.index')->with('warring', 'Xóa thành công');
        }
    }
}
