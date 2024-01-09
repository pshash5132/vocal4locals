<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'max:200'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'postalcode' => ['required', 'string'],
            'contact' => ['required', 'string', 'max:10'],
            'address_type' => ['required', 'string', 'max:10'],
        ]);
        $isDefault = $request->is_default == 'true' ? 1 : 0;
        if (Auth::user()->addresses()->where('is_default', 1)->exists()) {
            if ($isDefault) {
                Auth::user()->addresses()->update(['is_default' => 0]);
            }
        } else {
            $isDefault = 1;
        }
        $insert = new UserAddress();
        $insert->user_id = Auth::user()->id;
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->address = $request->address;
        $insert->city = $request->city;
        $insert->state = $request->state;
        $insert->postalcode = $request->postalcode;
        $insert->contact = $request->contact;
        $insert->address_type = $request->address_type;
        $insert->is_default = $isDefault;
        $insert->save();

        toastr('Address added successfully', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $address = UserAddress::findOrFail($id);
        return response(['address' => $address]);
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
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'max:200'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'postalcode' => ['required', 'string'],
            'contact' => ['required', 'string', 'max:10'],
            'address_type' => ['required', 'string', 'max:10'],
        ]);
        $isDefault = $request->is_default == 'true' ? 1 : 0;
        if (Auth::user()->addresses()->where('is_default', 1)->exists()) {
            if ($isDefault) {
                Auth::user()->addresses()->update(['is_default' => 0]);
            }
        } else {
            $isDefault = 1;
        }
        $insert = UserAddress::findOrFail($id);
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->address = $request->address;
        $insert->city = $request->city;
        $insert->state = $request->state;
        $insert->postalcode = $request->postalcode;
        $insert->contact = $request->contact;
        $insert->address_type = $request->address_type;
        $insert->is_default = $isDefault;
        $insert->save();

        toastr('Address updated successfully', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = UserAddress::findOrFail($id);
        $delete->delete();
        return response(['status' => '1', 'message' => 'Deleted Successfully']);
    }
}
