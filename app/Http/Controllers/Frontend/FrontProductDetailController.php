<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontProductDetailController extends Controller
{
    public function buildCategoryConditions($query, $request, $column = 'slug')
    {
        return $query->when($request->has('category'), function ($query) use ($request, $column) {
            return $query->where($column, $request->category);
        })->when($request->has('subcategory'), function ($query) use ($request, $column) {
            return $query->whereHas('subCategories', function ($q) use ($request, $column) {
                $q->where($column, $request->subcategory);
            });
        });
    }

    public function list(Request $request)
    {
        // DB::enableQueryLog();
        $category = Category::where('status', '1')
            ->when($request->has('category'), function ($query) use ($request) {
                return $query->where('slug', $request->category);
            })
            ->when($request->has('subcategory'), function ($query) use ($request) {
                return $query->whereHas('subCategories', function ($q) use ($request) {
                    $q->where('slug', $request->subcategory);
                });
            })
            ->get();
        // $queries = DB::getQueryLog();

// // Display the queries
        // dd($category->count());
        $subcaregories = SubCategory::with('category')
            ->when($request->has('subcategory'), function ($query) use ($request) {
                return $query->where('slug', $request->subcategory);
            })
            ->when($request->has('category'), function ($query) use ($request) {
                return $query->whereHas('category', function ($q) use ($request) {
                    $q->where('slug', $request->category);
                });
            })
            ->where('status', '1')->get();

        $products = Product::with([
            'productImageGallery',
            'subCategory',
            'subCategory.category',
            'variants',
            'brand',
        ])->where('status', '1')
        ->where('is_approved', 1)
            ->when($request->has('subcategory'), function ($query) use ($request) {
                return $query->whereHas('subCategory', function ($q) use ($request) {
                    $q->where('slug', $request->subcategory);
                });
            })
            ->when($request->has('category'), function ($query) use ($request) {
                return $query->whereHas('subCategory.category', function ($q) use ($request) {
                    $q->where('slug', $request->category);
                });
            })
            ->when($request->has('search'), function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%')
                    ->orwhere('long_description', 'like', '%' . $request->search . '%');
            })
            ->when($request->has('offer'), function ($query) use ($request) {
                return $query->whereHas('offers', function ($q) use ($request) {
                    $q->where('slug', $request->offer);
                });
            })
            ->get();

        // $queries = DB::getQueryLog();

// // Display the queries
        // dd($queries);
        $page = 'frontend.product.list';
        return view('frontend.layouts.master',
            compact(
                "page",
                "products", "category", "subcaregories"
            ));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::with('productImageGallery')->where('name', 'like', '%' . $query . '%')
        ->where('is_approved', 1)
        ->where('status', 1)
        // ->orWhere('long_description', 'like', '%' . $query . '%')
            ->limit(10) // Adjust the number of results as needed
            ->get();

        return response()->json($products);
    }
    public function showDetail(string $slug)
    {

        $product = Product::with('productImageGallery', 'subCategory', 'variants', 'brand')->where('slug', $slug)->where('status', '1')->where('is_approved', 1)->first();
        $related_products = Product::with('productImageGallery', 'subCategory', 'variants', 'brand')->where('status', '1')->where('is_approved', 1)->where('subcategory_id', $product->subcategory_id)->where('id', '!=', $product->id)->get();

        // dd($product->toSql(), $product->getBindings());
        $page = 'frontend.product.detail';
        return view('frontend.layouts.master',
            compact(
                "page",
                "product",
                "related_products"
            ));
    }
    public function variantDetails(Request $request)
    {
        $variants = ProductVariant::where('id', $request->variantId)->first();

        $variants->discountPercent = calculateDiscountPercent($variants->price, $variants->offer_price);
        return response(['status' => '1', 'message' => 'Variant Data', 'data' => $variants]);
    }

    public function getMinMaxPrices()
    {
        $minPrice = ProductVariant::min('price');
        $maxPrice = ProductVariant::max('price');

        return response()->json(['minPrice' => $minPrice, 'maxPrice' => $maxPrice]);
    }

    public function getProductsByPrice(Request $request)
    {
        $minPrice = $request->min;
        $maxPrice = $request->max;

        $products = Product::with([
            'productImageGallery',
            'subCategory',
            'subCategory.category',
            'variants',
            'brand',
            'reviews'
        ])->where('status', '1')
        ->where('is_approved', 1)
            ->when($request->has('subcategory'), function ($query) use ($request) {
                return $query->whereHas('subCategory', function ($q) use ($request) {
                    $q->where('slug', $request->subcategory);
                });
            })
            ->when($request->has('category'), function ($query) use ($request) {
                return $query->whereHas('subCategory.category', function ($q) use ($request) {
                    $q->where('slug', $request->category);
                });
            })
            ->when($request->has('search'), function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%')
                    ->orwhere('long_description', 'like', '%' . $request->search . '%');
            })
            ->when($request->has('offer'), function ($query) use ($request) {
                return $query->whereHas('offers', function ($q) use ($request) {
                    $q->where('slug', $request->offer);
                });
            })
            ->whereHas('variants', function ($q) use ($minPrice, $maxPrice) {
                $q->whereBetween('price', [$minPrice, $maxPrice]);

            })
            ->when($request->has('sortOrder'), function ($query) use ($request) {
                // Move orderBy outside of whereHas
                // $query->orderBy('variants.price', $request->sortOrder);

            })
            ->get();
        // DB::enableQueryLog();
        if ($request->sortOrder == "asc") {

            $products = $products->sortBy(function ($product) {
                return $product->variants->min('price'); // Sort by minimum variant price
            }); // Ascending order
        } else {
            $products = $products->sortByDesc(function ($product) {
                return $product->variants->min('price'); // Sort by minimum variant price
            }); // Ascending order
        }
        // dd($products);
// $queries = DB::getQueryLog();
//         dd($queries);
// // Display the queries
        // dd($category->count());
        return view('ProductAjax', compact('products'))->render();
    }
}