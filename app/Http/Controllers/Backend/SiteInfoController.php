<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class SiteInfoController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SiteInfo::first();
        $page = 'about.siteInfo';
        return view('admin.layouts.master', compact('page','data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'about.siteInfo';
        return view('admin.layouts.master', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'footer_title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = SiteInfo::first();
        if(!$data){
            $data = new SiteInfo();
        }
        $image1 = $this->uploadImage($request, 'image1', 'uploads/siteInfo', $data->image1);
        $image2 = $this->uploadImage($request, 'image2', 'uploads/siteInfo', $data->image2);
        $footer_image = $this->uploadImage($request, 'footer_image', 'uploads/siteInfo', $data->footer_image);

        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->image1 = $image1;
        $data->image2 = $image2;
        $data->footer_title = $request->footer_title;
        $data->footer_image = $footer_image;
        $data->save();
        return redirect()->route('admin.siteInfo.index')->with('success', 'Site Info Updated Successfully.');

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
        //
    }
}