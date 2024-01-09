<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\companyDetails;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class CompanyDetailController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = companyDetails::first();
        $page = 'companyDetail.create';
        if ($data) {
            $page = 'companyDetail.edit';
        }
        return view('admin.layouts.master', compact('page', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $page = 'companyDetail.create';
        return view('admin.layouts.master', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['required', 'image', 'max:2000'],
            'footer_tag' => ['required', 'string', 'max:500'],
            'mobile' => ['required', 'string', 'max:20'],
            'website' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:25'],
            'instagram' => ['required', 'string', 'max:35'],
            'facebook' => ['required', 'string', 'max:35'],
            'twitter' => ['required', 'string', 'max:35'],
            'whatsapp' => ['required', 'string', 'max:35'],
        ]);
        $insert = new companyDetails();
        // handle file upload
        $imagePath = $this->uploadImage($request, 'logo', 'uploads/logo');
        $insert->logo = $imagePath;
        $insert->footer_tag = $request->footer_tag;
        $insert->mobile = $request->mobile;
        $insert->website = $request->website;
        $insert->email = $request->email;
        $insert->instagram = $request->instagram;
        $insert->facebook = $request->facebook;
        $insert->twitter = $request->twitter;
        $insert->whatsapp = $request->whatsapp;
        $insert->save();
        toastr('Created successfully!');
        return redirect()->back();
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
        $data = companyDetails::findOrFail($id);
        $page = 'companyDetail.edit';
        return view('admin.layouts.master', compact('page', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2000'],
            'footer_tag' => ['required', 'string', 'max:500'],
            'mobile' => ['required', 'string', 'max:20'],
            'website' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'max:25'],
            'instagram' => ['required', 'string', 'max:35'],
            'facebook' => ['required', 'string', 'max:35'],
            'twitter' => ['required', 'string', 'max:35'],
            'whatsapp' => ['required', 'string', 'max:35'],
        ]);
        $update = companyDetails::findOrFail($id);
        // handle file upload
        $imagePath = $this->uploadImage($request, 'logo', 'uploads/logo', $update->logo);
        $update->logo = $imagePath;
        $update->footer_tag = $request->footer_tag;
        $update->mobile = $request->mobile;
        $update->website = $request->website;
        $update->email = $request->email;
        $update->instagram = $request->instagram;
        $update->facebook = $request->facebook;
        $update->twitter = $request->twitter;
        $update->whatsapp = $request->whatsapp;
        $update->save();
        toastr('Created successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = companyDetails::findOrFail($id);
        $this->deleteImage($delete->banner);
        $delete->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
}
