<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['categorys'] = Category::query()->orderBy('id', 'desc')->paginate(10);
        return view('admins.categorys.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        /**
         * Undocumented function
         *
         * @param Request $request
         * @return void
         */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //
        /**
         * Undocumented function
         *
         * @param string $id
         * @return void
         */
        if($request->isMethod('POST')) {
            $data = $request->only('name');
            $category_new = Category::query()->create($data);
            return back()->with('success', 'Thêm mới loại giày thành công');
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
        /**
         * Check Request
         */
        if($request->isMethod('PUT')) {
            $category = Category::findOrFail($id);
            $params = $request->only('name');
            $category->update($params);
            return redirect()->route('category.index')->with('success',"Sửa loại giày thành công");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        if($request->isMethod('DELETE')) {
            $category = Category::query()->findOrFail($id);
            $response = $category->delete();
            return redirect()->route('category.index')->with('warning', 'Xóa loại giày thành công');
        }
    }
}
