<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{

    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $appends = ['discount_percent'];
    public function getDiscountPercentAttribute()
    {
        return calculateDiscountPercent($this->attributes['price'], $this->attributes['offer_price']);
    }

    protected $casts = [
        'discount_percent' => 'float', // This cast triggers the mutator
    ];

}
