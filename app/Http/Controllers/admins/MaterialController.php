<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['materials'] = Material::query()->orderBy('id', 'desc')->paginate(10);
        return view('admins.materials.index',$data);
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
    public function store(MaterialRequest $request)
    {
        //
        if($request->isMethod('POST')) {
            $data = $request->only('name');
            $material_new = Material::query()->create($data);
            return back()->with('success', 'Thêm mới chất liệu thành công');
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
            $material = Material::query()->findOrFail($id);
            $material->update($data);
            return back()->with('success', 'Sửa chất liệu thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        if($request->isMethod('DELETE')) {
            $material = Material::query()->findOrFail($id);
            $material->delete();
            return back()->with('warning','Xóa chất liệu thành công');
        }
    }
}
