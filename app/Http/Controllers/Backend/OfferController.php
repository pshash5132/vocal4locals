<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\OfferDataTable;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Str;

class OfferController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public $folder = 'offer';
    public function index(OfferDataTable $dataTable)
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
        $products = Product::all();
        return view('admin.layouts.master', compact('page', 'folder', 'page', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        $imagePath = $this->uploadImage($request, 'image', 'uploads/offer');

        // Create the offer
        $offer = new Offer();
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->image = $imagePath;
        $offer->status = 1;
        $offer->slug = Str::slug($request->title);

        $offer->save();
        // Attach selected products to the offer
        $offer->products()->attach($request->products);
        // toastr('Offer Created Successfully!');

        return redirect()->route('admin.offer.index')->with('success', 'Offer created successfully.');
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
        $page = $folder . '.edit';
        $offer = Offer::with('products')->findOrFail($id);
        $products = Product::all();
        $selectedProductIds = $offer->products->pluck('id')->toArray();

        return view('admin.layouts.master', compact('page', 'folder', 'offer', 'products', 'selectedProductIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        // Create the offer
        $offer = Offer::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'image', 'uploads/offer', $offer->image);
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->image = $imagePath;
        $offer->status = 1;
        $offer->slug = Str::slug($request->title);

        $offer->save();
        // Attach selected products to the offer
        $offer->products()->sync($request->input('products'));

        // toastr('Offer Created Successfully!');

        return redirect()->route('admin.offer.index')->with('success', 'Offer created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Offer::findOrFail($id);
        $this->deleteImage($data->image);
        $data->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
    public function changeStatus(Request $request)
    {
        $data = Offer::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}
