<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    const CREATED = 'created';
    const PAID = 'paid';
    const RETURNED = 'returned';

    protected $fillable = [
        'total_price',
        'status'
    ];

    public function products(): BelongsToMany
    {
        return $this
            ->belongsToMany(Product::class, 'product_orders', 'order_id', 'product_id')
            ->withPivot('product_count');
    }
}
