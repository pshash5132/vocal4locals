<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\ProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ProductImageGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public $folder = 'products-image-gallery';
    public $page = 'product.image-gallery';
    public function index(Request $request, ProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        $folder = $this->folder;
        $page = $this->page . '.index';

        return $dataTable->render('admin.layouts.master', compact('page', 'product', 'folder'));
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
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'images', 'max:2048'],
        ]);
        $imagePath = $this->uploadMultiImage($request, 'images', 'uploads/product');
        foreach ($imagePath as $path) {
            $insert = new ProductImageGallery();
            $insert->image = $path;
            $insert->product_id = $request->product_id;
            $insert->save();
        }
        toastr('Uploaded successfully', 'success');
        return redirect()->route('admin.' . $this->folder . '.index', ['product' => $request->product_id]);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ProductImageGallery::findOrFail($id);
        $this->deleteImage($data->image);
        $data->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
}