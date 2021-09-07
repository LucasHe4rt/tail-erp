<?php

namespace App\Models\Product;

use App\Models\Product\ProductCategory as ProductProductCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'product_category_id'
    ];

    public function category()
    {
        return $this->belongsTo(ProductProductCategory::class, 'product_category_id');
    }
}
