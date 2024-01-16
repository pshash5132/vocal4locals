<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductCreate as ProductCreateRequest;
use App\Http\Requests\admin\ProductUpdate;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use App\Traits\ImageUploadTrait;
use Auth;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public $folder = 'product';
    public function index(ProductDataTable $dataTable)
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
        $categories = Category::all();
        $brands = Brand::all();
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {

        $imagePath = $this->uploadImage($request, 'image', 'uploads/products');
        $insert = new Product();
        $insert->vendor_id = Auth::user()->vendor->id;
        $insert->brand_id = $request->brand_id;
        $insert->subcategory_id = $request->subcategory_id;
        $insert->name = $request->name;
        $insert->slug = Str::slug($request->name);
        $insert->thumb_image = $imagePath;
        $insert->qty = $request->qty;
        $insert->short_description = $request->short_description;
        $insert->long_description = $request->long_description;
        $insert->video_link = $request->video_link;
        $insert->sku = $request->sku;
        // $insert->price = $request->price;
        // $insert->offer_price = $request->offer_price;
        $insert->offer_start_date = $request->offer_start_date;
        $insert->offer_end_date = $request->offer_end_date;
        $insert->product_type = $request->product_type;
        $insert->status = $request->status;
        $insert->is_approved = 1;
        $insert->seo_title = $request->seo_title;
        $insert->seo_description = $request->seo_description;
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
        $data = Product::findOrFail($id);
        $sub_category = SubCategory::find($data->subcategory_id);
        $sub_categories = SubCategory::where('category_id', $sub_category->category_id)->get();
        $categories = Category::all();
        $brands = Brand::all();
        $folder = $this->folder;
        $page = $this->folder . '.edit';
        return view('admin.layouts.master', compact('page', 'data', 'folder', 'categories', 'brands', 'sub_categories', 'sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdate $request, string $id)
    {
        $update = Product::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', 'uploads/products', $update->thumb_image);
        $update->vendor_id = Auth::user()->vendor->id;
        $update->brand_id = $request->brand_id;
        $update->subcategory_id = $request->subcategory_id;
        $update->name = $request->name;
        $update->slug = Str::slug($request->name);
        $update->thumb_image = $imagePath;
        $update->qty = $request->qty;
        $update->short_description = $request->short_description;
        $update->long_description = $request->long_description;
        $update->video_link = $request->video_link;
        $update->sku = $request->sku;
        // $update->price = $request->price;
        // $update->offer_price = $request->offer_price;
        $update->offer_start_date = $request->offer_start_date;
        $update->offer_end_date = $request->offer_end_date;
        $update->product_type = $request->product_type;
        $update->status = $request->status;
        $update->seo_title = $request->seo_title;
        $update->seo_description = $request->seo_description;
        $update->save();
        toastr('Updated successfully', 'success');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $productImages = ProductImageGallery::where('product_id', $id)->get();
        foreach ($productImages as $value) {
            $this->deleteImage($value->image);
            $value->delete();
        }
        $this->deleteImage($product->thumb_image);
        $variants = ProductVariant::where('product_id', $id)->get();
        foreach ($variants as $value) {
            // $value->productVariantItems()->delete();
            $value->delete();
        }
        $product->delete();
        return response(['status' => '1', 'message' => 'Deleted successfully']);
    }
    //get all product subcategories

    public function getSubCategories(Request $request)
    {
        return SubCategory::where('category_id', $request->id)->get();
    }

    public function changeStatus(Request $request)
    {
        $data = Product::findOrFail($request->id);
        $data->status = $request->status == 'true' ? '1' : '0';
        $data->save();
        // dd($data);
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}
