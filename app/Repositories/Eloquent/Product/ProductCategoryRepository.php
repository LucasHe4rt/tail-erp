<?php

namespace App\Repositories\Eloquent\Product;

use App\Models\Product\ProductCategory;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\ProductCategoryRepositoryInterface;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{
    public function __construct(ProductCategory $productCategory)
    {
        parent::__construct($productCategory);
    }
}
