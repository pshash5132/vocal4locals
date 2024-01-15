<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\CabInquiry;
use App\Models\HotelInquiry;
use App\Models\InquirySlider;
use App\Models\ServiceCategory;
use App\Models\ServiceInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InquiryController extends Controller
{
    //
    public function index(Request $req)
    {
        $page = 'frontend.inquiry.slider';
        $sliders = InquirySlider::where('status', 1)->get();
        $notshowTouch = true;
        return view('frontend.layouts.master', compact(
            'page',
            'sliders',
            'notshowTouch'
        ));
    }

    public function hotel_inquiry(Request $req)
    {
        $req->validate([
            'location' => ['required', 'string', 'max:200'],
            'check_in' => ['required', 'string', 'max:200'],
            'check_out' => ['required', 'string', 'max:200'],
            'budget' => ['required', 'max:20'],
        ]);
        // dd(implode(',', $req->children_age));
        $inquiry = new HotelInquiry();
        $inquiry->user_id = Auth::user()->id;
        $inquiry->location = $req->location;
        $inquiry->check_in = $req->check_in;
        $inquiry->check_out = $req->check_out;
        $inquiry->budget = $req->budget;
        $inquiry->rooms = $req->room_qty;
        $inquiry->adults = $req->adult_qty;
        $inquiry->childrens = $req->child_qty;
        $inquiry->childrens_age = isset($req->children_age) ? implode(",", $req->children_age) : 0;
        $inquiry->save();
        toastr('Inquiry created successfully!');
        return redirect()->back();
    }

    public function cab_inquiry(Request $req)
    {
        $req->validate([
            'from_location' => ['required', 'string', 'max:200'],
            'to_location' => ['required', 'string', 'max:200'],
            'departure' => ['required', 'string', 'max:200'],
            'return' => ['required', 'string', 'max:200'],
            'budget' => ['required', 'max:20'],
        ]);
        // dd($req->all());

        $inquiry = new CabInquiry();
        $inquiry->user_id = Auth::user()->id;
        $inquiry->from_location = $req->from_location;
        $inquiry->to_location = $req->to_location;
        $inquiry->departure = $req->departure;
        $inquiry->return = $req->return;
        $inquiry->budget = $req->budget;
        $inquiry->save();
        toastr('Inquiry created successfully!');
        return redirect()->back();
    }

    public function serviceDetail(string $slug)
    {
        $page = 'frontend.services.detail';
        $services = ServiceCategory::with('ServiceProducts')->where('slug', $slug)->first();
        return view('frontend.layouts.master', compact(
            'page',
            'services'
        ));
    }
    public function serviceInquiry(string $slug)
    {
        $page = 'frontend.services.inquiry';
        $services = ServiceCategory::whereHas('serviceProducts', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->with('ServiceProducts')->first();
        return view('frontend.layouts.master', compact(
            'page',
            'services'
        ));
    }
    public function search(Request $request)
    {
        $search = $request->input('query');
        $services = ServiceCategory::whereHas('serviceProducts', function ($query) use ($search) {
            $query->orWhere('name', 'like', '%' . $search . '%');
        })->orWhere('name', 'like', '%' . $search . '%')->with('serviceProducts')->get();
        return response()->json($services);
    }
    public function StoreServiceInquiry(Request $req)
    {

        $req->validate([
            'service_category_id' => ['required', 'integer'],
            'service_product_id' => ['required', 'integer'],
            'budget' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'max:200'],
            'address' => ['required', 'string'],
            'address_type' => ['required', 'string', 'max:20'],
            'city' => ['required', 'string', 'max:20'],
            'state' => ['required', 'string', 'max:20'],
            'pincode' => ['required', 'string', 'max:20'],
            'mobile' => ['required', 'integer'],
        ]);

        $inquiry = new ServiceInquiry();
        // $inquiry->user_id = Auth::user()->id;
        $inquiry->service_category_id = $req->service_category_id;
        $inquiry->service_product_id = $req->service_product_id;
        $inquiry->budget = $req->budget;
        $inquiry->name = $req->name;
        $inquiry->email = $req->email;
        $inquiry->address = $req->address;
        $inquiry->address_type = $req->address_type;
        $inquiry->city = $req->city;
        $inquiry->state = $req->state;
        $inquiry->pincode = $req->pincode;
        $inquiry->mobile = $req->mobile;
        $inquiry->save();
        toastr('Service Inquiry Created successfully!');
        return redirect()->route('home');
    }

}
