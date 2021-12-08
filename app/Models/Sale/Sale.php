<?php

namespace App\Models\Sale;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    protected $fillable = [
        'client_name', 'client_cpf', 'total', 'user_id'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
