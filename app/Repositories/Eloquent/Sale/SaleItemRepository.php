<?php

namespace App\Repositories\Eloquent\Sale;

use App\Models\Sale\SaleItem;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\SaleItemRepositoryInterface;

class SaleItemRepository extends BaseRepository implements SaleItemRepositoryInterface
{
    public function __construct(SaleItem $saleItem)
    {
        parent::__construct($saleItem);
    }
}
