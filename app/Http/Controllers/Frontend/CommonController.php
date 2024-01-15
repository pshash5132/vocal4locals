<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Contact;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    //
    public function about()
    {
        $about = About::first();
        $page = 'frontend.about.index';
        return view('frontend.layouts.master',
            compact(
                "page",
                "about"
            ));
    }

    public function contact()
    {
        $page = 'frontend.contact.index';
        $notshowTouch = true;
        return view('frontend.layouts.master',
            compact(
                "page",
                "notshowTouch"
            ));
    }
    public function contactAdd(Request $req)
    {
        $req->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'max:200'],
            'mobile' => ['required'],
            'message' => ['required', 'string'],
        ]);
        $contact = new Contact();
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->mobile = $req->mobile;
        $contact->message = $req->message;
        $contact->save();
        toastr('Contact form submited successfully!');
        return redirect()->back();

    }

}
