<?php

namespace App\Repositories\Eloquent;

use App\Models\Stock;
use App\Repositories\StockRepositoryInterface;

class StockRepository extends BaseRepository implements StockRepositoryInterface
{
    public function __construct(Stock $stock)
    {
        parent::__construct($stock);
    }
}
