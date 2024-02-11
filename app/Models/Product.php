<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_product');
    }

    public function productImageGallery()
    {
        return $this->hasMany(ProductImageGallery::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category()
    {
        // return $this->subCategory->category();
    }
    public function variants()
    {

        return $this->hasMany(ProductVariant::class)->orderBy('is_default', 'desc');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}