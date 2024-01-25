<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\ServiceCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class ServiceCategoryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public $folder = 'service-category';
    public $page = 'service-category';
    public function index(ServiceCategoryDataTable $dataTable)
    {
        $folder = $this->folder;
        $page = $this->folder . '.index';
        return $dataTable->render('admin.layouts.master', compact('folder', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder', 'page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:50'],
            'banner' => ['required', 'image', 'max:2000'],
            'image' => ['required', 'image', 'max:2000'],
            'status' => ['required', 'integer'],
        ]);

        $insert = new ServiceCategory();
        $insert->name = $request->name;
        $insert->title = $request->title;

        $imagePath = $this->uploadImage($request, 'banner', 'uploads/service');
        $insert->banner = $imagePath;
        $imagePath = $this->uploadImage($request, 'image', 'uploads/service');
        $insert->image = $imagePath;
        $insert->slug = Str::slug($request->name);

        $insert->status = $request->status;
        $insert->save();
        toastr('Service category added successfully!');
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
        $data = ServiceCategory::findOrFail($id);
        $folder = $this->folder;
        $page = $folder . '/edit';
        return view('admin.layouts.master', compact('page', 'folder', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:50'],
            'banner' => ['nullable', 'image', 'max:2000'],
            'image' => ['nullable', 'image', 'max:2000'],
            'status' => ['required', 'integer'],
        ]);

        $update = ServiceCategory::findOrFail($id);
        $update->name = $request->name;
        $update->title = $request->title;
        $update->slug = Str::slug($request->name);
        $imagePath = $this->uploadImage($request, 'banner', 'uploads/service', $update->banner);
        $update->banner = $imagePath;
        $imagePath = $this->uploadImage($request, 'image', 'uploads/service', $update->image);
        $update->image = $imagePath;

        $update->status = $request->status;
        $update->save();
        toastr('Service category updated successfully!');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ServiceCategory::findOrFail($id);
        $this->deleteImage($data->banner);
        $this->deleteImage($data->image);
        $data->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $data = ServiceCategory::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}
