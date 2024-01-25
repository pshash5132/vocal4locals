<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function create(Request $req){
        $req->validate([
            'review_product_id'=> ['required'],
            'review'=> ['required','string','max:220'],
            'rating'=> ['required'],
        ]);

        $insert =new ProductReview;
        $insert->product_id = $req->review_product_id;
        $insert->user_id = Auth::user()->id;
        $insert->order_id = $req->order_id;
        $insert->review = $req->review;
        $insert->rating = $req->rating;
        $insert->save();
        toastr('Product review success');
        return redirect()->route('user.profile');
    }
}