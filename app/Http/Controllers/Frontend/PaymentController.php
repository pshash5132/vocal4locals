<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmation;
use App\Models\Order;
use App\Models\OrderProduct;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index()
    {
        // dd(Session::get('shipping_method'));

        $address = json_encode(Session::get('address'));
        $shipping_method = json_encode(Session::get('shipping_method'));
        $coupon = json_encode(Session::get('coupon'));
        $order = new Order();
        $order->invoice_id = rand(111111, 99999);
        $order->user_id = Auth::User()->id;
        $order->sub_total = getCartTotal();
        $order->amount = getMainCartTotal();
        $order->discount_amount = getMainCartDiscount();
        $order->product_qty = \Cart::content()->count();
        $order->payment_method = "COD";
        $order->payment_status = "Pending";
        $order->order_address = $address;
        $order->shipping_method = $shipping_method;
        $order->coupon = $coupon;
        $order->order_status = "Pending";
        $order->save();

        foreach (Cart::content() as $item) {
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item->options->product_id;
            $orderProduct->product_variant_id = $item->id;
            $orderProduct->vendor_id = $item->options->vendor_id;
            $orderProduct->product_name = $item->name;
            $orderProduct->unit_price = $item->price;
            $orderProduct->qty = $item->qty;
            $orderProduct->save();
        }
        Cart::destroy();
        Session::forget('address');
        Session::forget('shipping_method');
        Session::forget('coupon');
        toastr('Your order has been placed');
        Mail::to(Auth::user()->email)->send(new OrderConfirmation($order));
        return redirect()->route('home');
        if (!Session::has('address')) {
            return redirect()->route('user.checkout');
        }
        $data['page'] = 'frontend.pages.payment';
        return view('frontend.layouts.master', $data);
    }
}