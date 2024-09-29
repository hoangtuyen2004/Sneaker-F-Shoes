<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\SoleRequest;
use App\Models\Sole;
use Illuminate\Http\Request;

class SoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['soles'] = Sole::query()->orderBy('id', 'desc')->paginate(10);
        return view('admins.soles.index',$data);
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
    public function store(SoleRequest $request)
    {
        //
        if($request->isMethod('POST')) {
            $data = $request->only('name');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data['date_create'] = date('Y-m-d H:i:s');   
            $sole_new = Sole::query()->create($data);
            return redirect()->route('sole.index')->with('success', 'Thêm mới thành công');
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
            $sole = Sole::findOrFail($id);
            $sole->update($data);
            return redirect()->route('sole.index')->with('success', 'Sửa thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        if($request->isMethod('DELETE')) {
            $sole = Sole::findOrFail($id);
            $sole->delete();
            return redirect()->route('sole.index')->with('warring', 'Xóa thành công');
        }
    }
}
