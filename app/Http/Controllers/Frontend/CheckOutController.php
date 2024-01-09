<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShippingRule;
use App\Models\UserAddress;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        if (count($cartItems) == 0) {
            Session::forget('coupon');
        }
        $addresses = Auth::user()->addresses()->get();
        $shipingMethods = ShippingRule::where('status', 1)->get();
        $page = 'frontend.pages.checkout';
        return view('frontend.layouts.master',
            compact(
                "page",
                "cartItems",
                "addresses",
                "shipingMethods"
            ));
    }

    public function checkOutFormSubmit(Request $request)
    {
        $request->validate([
            'shipping_method_id' => ['required', 'integer'],
            'shipping_address_id' => ['required', 'integer'],
        ]);
        $shipingMethod = ShippingRule::findOrFail($request->shipping_method_id);
        if ($shipingMethod) {

            Session::put('shipping_method', [
                'id' => $shipingMethod->id,
                'name' => $shipingMethod->name,
                'type' => $shipingMethod->type,
                'cost' => $shipingMethod->cost,
            ]);
        }
        $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
        if ($address) {
            Session::put('address', $address);
        }
        return response(['status' => 'success', 'redirect_url' => route('user.payment')]);
    }
}
