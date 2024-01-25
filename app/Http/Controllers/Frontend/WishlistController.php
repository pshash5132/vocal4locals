<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        // DB::enableQueryLog();

        $wishlists = Wishlist::with(['product' => function ($q) {
            $q->with('variants');
        }])->get();
        // $queries = DB::getQueryLog();
        // dd($wishlists);
        $page = 'frontend.pages.wishlist';
        return view('frontend.layouts.master',
            compact(
                "page",
                "wishlists"
            ));
    }
    public function addToWishlist(Request $request)
    {
        if (!Auth::check()) {
            return response(['status' => 0, 'message' => 'login before add to wishlist']);
        }
        $wishlistCount = Wishlist::where(['product_id' => $request->id, 'user_id' => Auth::user()->id])->count();
        if ($wishlistCount > 0) {
            return response(['status' => 0, 'message' => 'The product is already into wishlist']);
        }
        $wishlist = new Wishlist();
        $wishlist->product_id = $request->id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();
        return response(['status' => 1, 'message' => 'Product is added into wishlist']);
    }
    public function removeWishlist(string $id)
    {
        if (!Auth::check()) {
            return response(['status' => 0, 'message' => 'login before remove from wishlist']);
        }
        $wishlistCount = Wishlist::find($id);
        if ($wishlistCount->count() < 0) {
            return response(['status' => 0, 'message' => 'The product is already deleted from wishlist']);
        }

        $wishlistCount->delete();
        return response(['status' => 1, 'message' => 'Product is deleted from wishlist']);
    }
}
