<?php
// set sidebar active

use App\Models\Category;
use App\Models\SiteInfo;
use Carbon\Carbon;

function setActive(array $routes)
{
    if (is_array($routes)) {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
    }
}

// function company()
// {
//     // return DB::table('company_details')->first();
// }

function categories()
{
    return Category::where('status', 1)
        ->with(['subCategories' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();
}

function siteInfo(){
    return  SiteInfo::first();
}
function checkDiscount($product)
{
    $currentDate = date('Y-m-d');
    if ($product->variants[0]->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }
    return false;

}
function checkDiscountService($product)
{
    $currentDate = date('Y-m-d');
    if ($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date) {
        return true;
    }
    return false;

}

function calculateDiscountPercent($orignalPrice, $discountedPrice)
{
    $discountAmount = $orignalPrice - $discountedPrice;
    $discountPersantage = ($discountAmount / $orignalPrice) * 100;
    return number_format((float) $discountPersantage, 2, '.', '');
}

function getCartTotal()
{
    $total = 0;
    foreach (\Cart::content() as $product) {
        $total += $product->price * $product->qty;
    }
    return $total;
}

function getMainCartTotal()
{
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if ($coupon['dicsount_type'] == 'amount') {
            $total = $subTotal - $coupon['discount'];
            if ($total < 0) {
                $total = 0;
            }
            return $total;
        } else {
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);

            return $discount;
        }
    } else {
        return getCartTotal();
    }
}

function getMainCartDiscount()
{
    if (Session::has('coupon')) {
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if ($coupon['dicsount_type'] == 'amount') {
            return $coupon['discount'];
        } else {
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            $total = $subTotal - $discount;
            return round($total, 2);
        }
    } else {
        return 0;
    }
}

function getFormattedShippingTimeAttribute($shipping_time)
{
    // Get the current time
    $currentTime = Carbon::now();

    // If the current time is after 5 PM, consider tomorrow as the shipping day
    if ($currentTime->hour >= 17) {
        $shippingDate = $currentTime->addDay();
    } else {
        $shippingDate = $currentTime;
    }

    // Calculate the delivery time based on the provided shipping time
    $deliveryTime = $shippingDate->copy()->addHours($shipping_time);

    // If the delivery time is within the delivery hours (10 AM to 5 PM), display delivery for today
    if ($deliveryTime->hour >= 10 && $deliveryTime->hour < 17) {
        $formattedTime = "Today before 5 PM";
    } else {
        // If the delivery time is after the delivery hours, display delivery for tomorrow
        $formattedTime = "Tomorrow before 5 PM";
    }

    // If shipping time is in days, display delivery date accordingly
    if ($shipping_time >= 24) {
        $formattedTime = $deliveryTime->format('l, F jS') . " before 5 PM";
    }
    return $formattedTime;
}