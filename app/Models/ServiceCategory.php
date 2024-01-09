<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    public function ServiceProducts()
    {
        return $this->hasMany(ServiceProduct::class);
    }
}