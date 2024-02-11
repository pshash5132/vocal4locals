<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ServiceCategory;
use App\Models\Slider;
use App\Models\TermsAndConditions;

class HomeController extends Controller
{
    //
    public function index()
    {

        $page = 'frontend.home.home';

        $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();

        $top_products = Product::with(["reviews","variants" => function ($q) {
            $q->where('is_default', true);
        }])
            ->where('status', 1)
            ->where('is_approved', 1)
            ->where('product_type', 'top_product')
            ->whereHas('variants', function ($q) {
                $q->where('is_default', 1);

            })
            ->get();

        $new_products = Product::with(["reviews","variants" => function ($q) {
            $q->where('is_default', true);
        }])
            ->where('status', 1)
            ->where('is_approved', 1)
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
    function pricacyPolicy(){
        $data = PrivacyPolicy::first();
        $notshowTouch =1;
        $page = 'frontend.pages.privacy-policy';
        return view('frontend.layouts.master',
            compact(
                "page",
                "data",
                "notshowTouch",
            ));
    }
    function tAndC(){
        $data = TermsAndConditions::first();
        $page = 'frontend.pages.privacy-policy';
        $notshowTouch = 1;
        return view('frontend.layouts.master',
            compact(
                "page",
                "data",
                "notshowTouch"
            ));
    }
}