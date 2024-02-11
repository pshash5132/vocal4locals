<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\InquirySliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\InquirySlider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class InquirySliderController extends Controller
{

    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(InquirySliderDataTable $dataTable)
    {
        //
        $data['page'] = 'inquirySlider.index';
        return $dataTable->render('admin.layouts.master', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['page'] = 'inquirySlider.create';
        return view('admin.layouts.master', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'banner' => ['required', 'image', 'max:2000'],
            // 'type' => ['string', 'max:200'],
            // 'title' => ['required', 'string', 'max:200'],
            // 'starting_price' => ['max:200'],
            // 'btn_url' => ['url'],
            // 'serial' => ['required', 'integer'],
            // 'status' => ['required'],
        ]);
        $slider = new InquirySlider();
        // handle file upload
        $imagePath = $this->uploadImage($request, 'banner', 'uploads');
        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();
        toastr('Created successfully!');
        return redirect()->route('admin.inquirySlider.index');
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
        $slider = InquirySlider::findOrFail($id);
        $page = 'inquirySlider.edit';
        return view('admin.layouts.master', compact('page', 'slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2000'],
            // 'type' => ['string', 'max:200'],
            // 'title' => ['required', 'string', 'max:200'],
            // 'starting_price' => ['max:200'],
            // 'btn_url' => ['url'],
            // 'serial' => ['required', 'integer'],
            // 'status' => ['required'],
        ]);
        $slider = InquirySlider::findOrFail($id);
        // handle file upload
        $imagePath = $this->uploadImage($request, 'banner', 'uploads', $slider->banner);
        $slider->banner = $imagePath;
        $slider->type = $request->type;
        $slider->title = $request->title;
        $slider->starting_price = $request->starting_price;
        $slider->btn_url = $request->btn_url;
        $slider->serial = $request->serial;
        $slider->status = $request->status;
        $slider->save();
        toastr('Updated successfully!');
        return redirect()->route('admin.inquirySlider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = InquirySlider::findOrFail($id);
        $this->deleteImage($slider->banner);
        $slider->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
}