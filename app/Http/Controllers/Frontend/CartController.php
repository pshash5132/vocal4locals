<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // DB::enableQueryLog();
        $product = Product::with([
            'productImageGallery',
            'variants' => function ($q) use ($request) {
                $q->where('id', $request->variantId);
            },
        ])->whereHas('variants', function ($q) use ($request) {
            $q->where('id', $request->variantId);
        })->first();

        // $queries = DB::getQueryLog();
        // dd($queries);
        $price = $product->variants[0]->price;
        if (checkDiscount($product)) {
            $price = $product->variants[0]->offer_price;
        }
        $cartData = [
            'id' => $request->variantId,
            'name' => $product->name,
            'price' => $price,
            'qty' => $request->qty,
            'weight' => 1,
            'options' => [
                'variant_name' => $product->variants[0]->name,
                'discount_percent' => $product->variants[0]->discount_percent,
                'image' => $product->thumb_image,
                'product_id' => $product->id,
                'vendor_id' => $product->vendor_id,
            ],
        ];
        // Cart::destroy();
        Cart::add($cartData);
        return response(['status' => 1, 'message' => 'Product has been added into cart.']);
        print_r(Cart::content());
    }

    public function updateQty(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        $total = $this->productTotal($request->rowId);
        $subTotal = getCartTotal();
        $cart_total = getMainCartTotal();
        return response(['status' => 1, 'message' => 'Quantity has been updated.', 'data' => $total, 'subTotal' => $subTotal, 'cart_total' => $cart_total]);
    }
    public function cartClear()
    {
        Cart::destroy();
        return response(['status' => 1, 'message' => 'Your cart has been cleared!.']);
    }
    public function cartRemove(Request $request)
    {
        Cart::remove($request->rowId);
        return response(['status' => 1, 'message' => 'Product has been removed!.']);
    }
    public function productTotal($rowId)
    {
        $product = Cart::get($rowId);
        return $product->price * $product->qty;
    }
    public function cartDetails()
    {

        $cartItems = Cart::content();

        if (count($cartItems) == 0) {
            Session::forget('coupon');
        }
        $page = 'frontend.cart.cart-details';
        return view('frontend.layouts.master',
            compact(
                "page",
                "cartItems"
            ));
    }
    public function applyCoupon(Request $request)
    {
        if ($request->coupon === null) {
            return response(['status' => 0, 'message' => 'Coupon is required!']);
        }
        $coupon = Coupon::where(['status' => 1, 'code' => $request->coupon])->first();
        if ($coupon === null) {
            return response(['status' => 0, 'message' => 'Coupon is invalid!']);
        } else if ($coupon->start_date > date('Y-m-d')) {
            return response(['status' => 0, 'message' => 'Coupon is not started!']);
        } else if ($coupon->end_date < date('Y-m-d')) {
            return response(['status' => 0, 'message' => 'Coupon is expiered!']);
        } else if ($coupon->total_used >= $coupon->quantity) {
            return response(['status' => 0, 'message' => 'Coupon has reached limit!']);
        }

        Session::put('coupon', [
            'coupon_name' => $coupon->name,
            'coupon_code' => $coupon->code,
            'dicsount_type' => $coupon->discount_type,
            'discount' => $coupon->discount,
        ]);
        return response(['status' => 1, 'message' => 'Coupon has been applied successfully.']);
    }
    public function calculateDiscount()
    {
        if (Session::has('coupon')) {
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if ($coupon['dicsount_type'] == 'amount') {
                $total = $subTotal - $coupon['discount'];
                if ($total < 0) {
                    $total = 0;
                }
                return response(['status' => 1, 'cart_total' => $total, 'discount' => $coupon['discount']]);
            } else {
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = round($subTotal - $discount, 2);
                return response(['status' => 1, 'cart_total' => round($discount, 2), 'discount' => $total]);
            }
        } else {
            return response(['status' => 1, 'cart_total' => getMainCartTotal(), 'discount' => 0]);
        }
    }
}
