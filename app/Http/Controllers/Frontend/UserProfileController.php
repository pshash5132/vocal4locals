<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddress;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    //

    public function index()
    {
        $wishlists = Wishlist::with(['product' => function ($q) {
            $q->with('variants');
        }])->get();
        $page = 'frontend.profile.home';
        $addresses =  Auth::user()->addresses()->get();
        // dd($addresses);
        $orders = Auth::user()->orders()->get();
        return view('frontend.layouts.profile', compact('page', 'addresses', 'wishlists','orders'));
    }
    public function update(Request $req)
    {
        $req->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'contact' => ['required', 'max:10', 'min:10'],
        ]);
        $user = Auth::user();

        $user->name = $req->name;
        $user->email = $req->email;
        $user->contact = $req->contact;
        $user->save();
        toastr()->success('Profile updated successfully');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
        {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|same:new_password',
            ]);
            // Validation passed, process the form data
            $currentPassword = $request->input('current_password');
            $newPassword = $request->input('new_password');

            // Validate current password against the authenticated user's password
            if (!password_verify($currentPassword, Auth::user()->password)) {
                return redirect()->route('user.profile', ['change-password' => true])->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            // Update the user's password
            Auth::user()->update([
                'password' => bcrypt($newPassword),
            ]);

            // Redirect with success message or perform other actions
            return redirect()->route('user.profile', ['change-password' => true])->with('success', 'Password updated successfully.');
        }

}