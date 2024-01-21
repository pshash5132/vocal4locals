<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;

class CollaboratorController extends Controller
{
    use ImageUploadTrait;

    public function index(){
        $page = 'frontend.collaborator.add';
        return view('frontend.layouts.master',
            compact(
                "page",
            ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner' => ['image', 'max:2000'],
            'email' => ['required', 'string', 'max:200', 'unique:vendors,email', 'unique:users,email'],
            'mobile' => ['required', 'string', 'max:200', 'unique:vendors,phone'],
            'address' => ['required', 'string'],
            'password' => ['required', 'string','min:8'],
        ]);
        $imagePath = $this->uploadImage($request, 'banner', 'uploads/vendor');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = 'inactive';
        $user->role = 'vendor';
        $user->contact = $request->mobile;
        $user->password = bcrypt($request->password);
        $user->image = $imagePath;
        $user->save();

        $insert = new Vendor();
        $insert->banner = $imagePath;
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->phone = $request->mobile;
        $insert->address = $request->address;
        $insert->description = $request->description;
        $insert->fb_link = $request->fb_link;
        $insert->tw_link = $request->tw_link;
        $insert->insta_link = $request->insta_link;
        $insert->status = '0';
        $insert->user_id = $user->id;
        $insert->save();
        toastr('Vendor Created successfully', 'success');
        return redirect()->route('home');
    }
}