<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {

        $page = 'sub-category.index';
        return $dataTable->render('admin.layouts.master', compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $page = 'sub-category.create';
        return view('admin.layouts.master', compact('page', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'string', 'max:200', 'unique:sub_categories,name'],
            'status' => ['required'],
        ]);
        $insert = new SubCategory();
        $insert->category_id = $request->category_id;
        $insert->name = $request->name;
        $insert->slug = Str::slug($request->name);
        $insert->status = $request->status;
        $insert->save();
        toastr('Created successfully', 'success');
        return redirect()->route('admin.sub-category.index');
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
        $categories = Category::all();
        $data = SubCategory::findOrFail($id);
        $page = 'sub-category.edit';
        return view('admin.layouts.master', compact('page', 'data','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'string', 'max:200', 'unique:sub_categories,name,' . $id],
            'status' => ['required'],
        ]);
        $update = SubCategory::findOrFail($id);
        $update->category_id = $request->category_id;
        $update->name = $request->name;
        $update->slug = Str::slug($request->name);
        $update->status = $request->status;
        $update->save();
        toastr('Updated successfully', 'success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = SubCategory::findOrFail($id);
        $data->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
    public function changeStatus(Request $request)
    {
        $data = SubCategory::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}