<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        //
        $page = 'category.index';
        return $dataTable->render('admin.layouts.master', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'category.create';
        return view('admin.layouts.master', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'string', 'max:200', 'unique:categories,name'],
            'status' => ['required'],
        ]);
        $insert = new Category();
        $insert->name = $request->name;
        $insert->icon = $request->icon;

        $insert->slug = Str::slug($request->name);
        $insert->status = $request->status;
        $insert->save();
        toastr('Created successfully', 'success');
        return redirect()->route('admin.category.index');

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
        $data = Category::findOrFail($id);
        $page = 'category.edit';
        return view('admin.layouts.master', compact('page', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'string', 'max:200', 'unique:categories,name,' . $id],
            'status' => ['required'],
        ]);
        $update = Category::findOrFail($id);
        $update->name = $request->name;
        $update->icon = $request->icon;

        $update->slug = Str::slug($request->name);
        $update->status = $request->status;
        $update->save();
        toastr('Update successfully', 'success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $subCategory = SubCategory::where('category_id', $category->id)->count();
        if ($subCategory > 0) {
            return response(['status' => '0', 'message' => 'This item contain sub items']);
        }
        $category->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
        // $this->deleteImage($slider->banner);
    }
    public function changeStatus(Request $request)
    {
        $data = Category::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}
