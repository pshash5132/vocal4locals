<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\ServiceProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceProduct;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class ServiceProductController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public $folder = 'service-product';
    public $page = 'service-product';
    public function index(ServiceProductDataTable $dataTable)
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
        $categories = ServiceCategory::all();
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder', 'page', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:50'],
            'price' => ['required', 'integer'],
            'service_category_id' => ['required', 'integer'],
            'offer_price' => ['required', 'integer'],
            'offer_start_date' => ['required', 'string'],
            'offer_end_date' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'image' => ['required', 'image', 'max:2000'],
            'status' => ['required', 'integer'],
        ]);

        $insert = new ServiceProduct();
        $insert->service_category_id = $request->service_category_id;
        $insert->name = $request->name;
        $insert->title = $request->title;
        $insert->price = $request->price;
        $insert->offer_price = $request->offer_price;
        $insert->offer_start_date = $request->offer_start_date;
        $insert->offer_end_date = $request->offer_end_date;
        $insert->detail = $request->detail;

        $imagePath = $this->uploadImage($request, 'image', 'uploads/service');
        $insert->image = $imagePath;
        $insert->slug = Str::slug($request->name);

        $insert->status = $request->status;
        $insert->save();
        toastr('Service product added successfully!');
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
        $categories = ServiceCategory::all();
        $data = ServiceProduct::findOrFail($id);
        $folder = $this->folder;
        $page = $folder . '/edit';
        return view('admin.layouts.master', compact('page', 'data', 'folder', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'service_category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:50'],
            'price' => ['required', 'integer'],
            'offer_price' => ['required', 'integer'],
            'offer_start_date' => ['required', 'string'],
            'offer_end_date' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2000'],
            'status' => ['required', 'integer'],
        ]);

        $update = ServiceProduct::findOrFail($id);

        $update->service_category_id = $request->service_category_id;
        $update->name = $request->name;
        $update->title = $request->title;
        $update->price = $request->price;
        $update->offer_price = $request->offer_price;
        $update->offer_start_date = $request->offer_start_date;
        $update->offer_end_date = $request->offer_end_date;
        $update->detail = $request->detail;

        $imagePath = $this->uploadImage($request, 'image', 'uploads/service', $update->image);
        $update->image = $imagePath;
        $update->slug = Str::slug($request->name);

        $update->status = $request->status;
        $update->save();
        toastr('Service product added successfully!');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ServiceProduct::findOrFail($id);
        $this->deleteImage($data->image);
        $data->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $data = ServiceProduct::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}
