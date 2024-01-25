<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {

        $data = ['page' => 'profile.index'];
        return view('admin.layouts.master', $data);
    }

    public function updateProfile(Request $req)
    {

        $req->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:2048'],
        ]);
        $user = Auth::user();

        if ($req->hasFile('image')) {
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image = $req->image;
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $user->image = '/uploads/' . $imageName;
        }
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();
        toastr()->success('Profile updated successfully');
        return redirect()->back();
    }

    public function updatePassword(Request $req)
    {
        $req->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $req->user()->update([
            'password' => bcrypt($req->password),
        ]);
        toastr()->success('Password updated successfully');

        return redirect()->back();

    }
}
