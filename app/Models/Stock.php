<?php

namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

class Stock extends Model
{
    protected $fillable = [
        'product_id', 'quantity', 'unit_value'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function addQuantity(int $value): void
    {
        $this->update([
            'quantity' => $this->attributes['quantity'] + $value
        ]);
    }

    public function removeQuantity(int $value): void
    {
        $this->update([
            'quantity' => $this->attributes['quantity'] - $value
        ]);
    }
}
