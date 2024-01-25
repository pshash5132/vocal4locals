<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\ProductVariantDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $folder = 'products-variant';
    public $page = 'product.product-variant';
    public function index(ProductVariantDataTable $dataTable)
    {
        $folder = $this->folder;
        $page = $this->page . '.index';
        return $dataTable->render('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folder = $this->folder;
        $page = $this->page . '.create';
        return view('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'status' => ['required'],
        ]);
        $insert = new ProductVariant();
        $insert->product_id = $request->product_id;
        $insert->name = $request->name;
        $insert->status = $request->status;
        $insert->save();
        toastr('Created successfully!');
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
        $data = ProductVariant::findOrFail($id);
        $folder = $this->folder;
        $page = $this->page . '.edit';
        return view('admin.layouts.master', compact('page', 'data', 'folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'status' => ['required'],
        ]);
        $update = ProductVariant::findOrFail($id);
        $update->name = $request->name;
        $update->status = $request->status;
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
        $variantItemCheck = ProductVariantItem::where('product_variant_id', $id)->count();
        if ($variantItemCheck > 0) {
            return response(['status' => '0', 'message' => 'This variant contents variant items, Please delete variant item first.']);
        }
        $delete->delete();
        return response(['status ' => '1', 'message' => 'Deleted Successfully']);
    }
    public function changeStatus(Request $request)
    {
        $data = ProductVariant::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}