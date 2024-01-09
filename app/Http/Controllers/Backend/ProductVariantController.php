<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{

    public $folder = 'products-variant';
    public $page = 'product.product-variant';
    public function index(ProductVariantDataTable $dataTable, $productId)
    {
        $product = Product::findOrFail($productId);
        $folder = $this->folder;
        $page = $this->page . '.index';
        return $dataTable->render('admin.layouts.master', compact('page', 'folder', 'product'));
    }
    public function create()
    {
        $product = Product::findOrFail(request()->product);
        $folder = $this->folder;
        $page = $this->page . '.create';
        return view('admin.layouts.master', compact('page', 'folder', 'product'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:200'],
            'price' => ['required', 'integer'],
            'qty' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required'],
        ]);
        $insert = new ProductVariant();
        $insert->product_id = $request->product_id;
        $insert->name = $request->name;
        $insert->price = $request->price;
        $insert->offer_price = $request->offer_price;
        $insert->is_default = $request->is_default;
        $insert->status = $request->status;
        $insert->qty = $request->qty;

        $insert->save();
        toastr('Product variant item created successfully!');
        return redirect()->route('admin.' . $this->folder . '.index', $request->product_id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ProductVariant::findOrFail($id);
        $folder = $this->folder;
        $page = $this->page . '.edit';
        return view('admin.layouts.master', compact('page', 'data', 'folder'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:200'],
            'price' => ['required', 'integer'],
            'is_default' => ['required'],
            'status' => ['required'],
            'qty' => ['required', 'integer'],
        ]);
        $update = ProductVariant::findOrFail($id);
        $update->product_id = $request->product_id;
        $update->name = $request->name;
        $update->price = $request->price;
        $update->offer_price = $request->offer_price;
        $update->is_default = $request->is_default;
        $update->status = $request->status;
        $update->qty = $request->qty;

        $update->save();
        toastr('Updated successfully!');
        return redirect()->route('admin.' . $this->folder . '.index', ['product' => $request->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = ProductVariant::findOrFail($id);
        $delete->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
    public function changeStatus(Request $request)
    {
        $data = ProductVariant::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}