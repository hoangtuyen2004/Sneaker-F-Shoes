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
            $sole_new = Sole::query()->create($data);
            return back()->with('success', 'Thêm mới đế giày thành công');
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
        if($request->isMethod('PUT')) {
            $data = $request->only('name');
            $sole = Sole::findOrFail($id);
            $sole->update($data);
            return back()->with('success', 'Sửa đế giày thành công thành công');
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
            return back()->with('warning', 'Xóa đế giày thành công thành công');
        }
    }
}
