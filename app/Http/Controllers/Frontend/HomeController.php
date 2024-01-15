<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ServiceCategory;
use App\Models\Slider;

class HomeController extends Controller
{
    //
    public function index()
    {
        $page = 'frontend.home.home';
        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();

        $top_products = Product::with(["variants" => function ($q) {
            $q->where('is_default', true);
        }])
            ->where('status', 1)
            ->where('product_type', 'top_product')
            ->get();

        $new_products = Product::with(["variants" => function ($q) {
            $q->where('is_default', true);
        }])
            ->where('status', 1)
            ->where('product_type', 'new_arrival')
            ->whereHas('variants', function ($q) {
                $q->where('is_default', 1);

            })->get();

        $services = ServiceCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $offers = Offer::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.layouts.master',
            compact(
                "page",
                "sliders",
                "new_products",
                "top_products",
                "services",
                "offers"
            ));
    }
}
