<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\BrandDataTable;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class BrandController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public $folder = 'brand';
    public function index(BrandDataTable $dataTable)
    {
        $folder = $this->folder;
        $page = $this->folder . '.index';
        return $dataTable->render('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['required', 'image', 'max:2000'],
            'name' => ['required', 'string', 'max:200', 'unique:brands,name'],
            'status' => ['required'],
            'is_fetured' => ['required'],
        ]);
        $imagePath = $this->uploadImage($request, 'logo', 'uploads/brand');
        $insert = new Brand();
        $insert->name = $request->name;
        $insert->logo = $imagePath;
        $insert->slug = Str::slug($request->name);

        $insert->is_fetured = $request->is_fetured;
        $insert->status = $request->status;
        $insert->save();
        toastr('Created successfully', 'success');
        return redirect()->route('admin.' . $this->folder . '.index');
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
        $folder = $this->folder;
        $data = Brand::findOrFail($id);
        $page = $this->folder . '.edit';
        return view('admin.layouts.master', compact('page', 'data', 'folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'logo' => ['nullable', 'image', 'max:2000'],
            'name' => ['required', 'string', 'max:200', 'unique:brands,name,' . $id],
            'status' => ['required'],
            'is_fetured' => ['required'],

        ]);

        $update = Brand::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'logo', 'uploads/brand', $update->logo);
        $update->name = $request->name;
        $update->status = $request->status;
        $update->logo = $imagePath;
        $update->is_fetured = $request->is_fetured;
        $update->save();
        toastr('Update successfully', 'success');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        // $subCategory = SubCategory::where('category_id', $category->id)->count();
        // if ($subCategory > 0) {
        //     return response(['status' => '0', 'message' => 'This item contain sub items']);
        // }
        $this->deleteImage($brand->logo);
        $brand->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
}
