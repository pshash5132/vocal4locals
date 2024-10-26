<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\admin\VendorDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Auth;
use App\Mail\VenderRegisterConfirmation;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;

class AdminVendorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait;
    public $folder = 'vendor-profile';
    public function index(VendorDataTable $dataTable)
    {
        //
        $folder = $this->folder;
        $page = $this->folder . '.index';
        return $dataTable->render('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $folder = $this->folder;
        $page = $folder . '.create';
        return view('admin.layouts.master', compact('page', 'folder'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['required', 'image', 'max:2000'],
            'email' => ['required', 'string', 'max:200', 'unique:vendors,email'],
            'phone' => ['required', 'string', 'max:200', 'unique:vendors,phone'],
            'address' => ['required', 'string'],
            'nob' => ['required', 'string'],
            'description' => ['required', 'string'],
            'fb_link' => ['nullable', 'string'],
            'tw_link' => ['nullable', 'string'],
            'instta_link' => ['nullable', 'string'],
            'status' => ['required'],
        ]);
        $imagePath = $this->uploadImage($request, 'banner', 'uploads/vendor');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = 'active';
        $user->role = 'vendor';
        $user->contact = $request->phone;
        $user->password = bcrypt('123456');
        $user->image = $imagePath;
        $user->save();

        $insert = new Vendor();
        $insert->banner = $imagePath;
        $insert->name = $request->name;
        $insert->nob = $request->nob;
        $insert->email = $request->email;
        $insert->phone = $request->phone;
        $insert->address = $request->address;
        $insert->description = $request->description;
        $insert->fb_link = $request->fb_link;
        $insert->tw_link = $request->tw_link;
        $insert->insta_link = $request->insta_link;
        $insert->status = $request->status;
        $insert->user_id = $user->id;
        $insert->save();
        toastr('Vendor Created successfully', 'success');
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
        $folder = $this->folder;
        $data = Vendor::findOrFail($id);
        $page = $this->folder . '.edit';
        return view('admin.layouts.master', compact('page', 'data', 'folder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2000'],
            'email' => ['required', 'string', 'max:200', 'unique:vendors,email,' . $id],
            'phone' => ['required', 'string', 'max:200', 'unique:vendors,phone,' . $id],
            'address' => ['required', 'string'],
            'nob' => ['required', 'string'],
            'description' => ['required', 'string'],
            'fb_link' => ['nullable', 'string'],
            'tw_link' => ['nullable', 'string'],
            'instta_link' => ['nullable', 'string'],
            'status' => ['required'],
        ]);

        $update = Vendor::findOrFail($id);
        $imagePath = $this->uploadImage($request, 'banner', 'uploads/vendor', $update->banner);
        $user = User::findOrFail($update->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->phone;
        $user->image = $imagePath;
        $user->save();
        $update->banner = $imagePath;
        $update->name = $request->name;
        $update->nob = $request->nob;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->description = $request->description;
        $update->fb_link = $request->fb_link;
        $update->tw_link = $request->tw_link;
        $update->insta_link = $request->insta_link;
        $update->status = $request->status;
        $update->save();
        toastr('Update successfully', 'success');
        return redirect()->route('admin.' . $this->folder . '.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = Vendor::findOrFail($id);
        $product = Product::where('vendor_id', $id)->count();
        if ($product > 0) {
            return response(['status' => '0', 'message' => 'This vendor have products, Please remove releted products.']);
        }
        @$this->deleteImage($vendor->logo||"");
        $vendor->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $data = Vendor::findOrFail($request->id);
        $data->status = $request->status == 'true' ? 1 : 0;
        $data->save();
        // dd($data->email)
        if($data->status==1){

            Mail::to($data->email)->send(new VenderRegisterConfirmation($data));
        }

        return response(['status' => '1', 'message' => 'Status Updated Successfully']);

    }
}