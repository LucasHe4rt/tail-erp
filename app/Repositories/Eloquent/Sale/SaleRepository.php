<?php

namespace App\Repositories\Eloquent\Sale;

use App\Models\Sale\Sale;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\SaleRepositoryInterface;

class SaleRepository extends BaseRepository implements SaleRepositoryInterface
{
    public function __construct(Sale $sale)
    {
        parent::__construct($sale);
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id)->load('items.product');
    }
}
