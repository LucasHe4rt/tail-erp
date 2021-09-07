<?php

namespace App\Repositories\Eloquent\Product;

use App\Repositories\Eloquent\BaseRepository;
use App\Models\Product\Product;
use App\Repositories\ProductCategoryRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    public function __construct(Product $product)
    {
        parent::__construct($product);
    }
}
