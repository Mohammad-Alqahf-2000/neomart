<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $table = 'store_order_items';

    protected $fillable = ['product_id', 'product_name', 'product_price', 'quantity', 'store_order_id'];

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'quantity' => "integer",
    ];

    public function storeOrder()
    {
        return $this->belongsTo(StoreOrder::class, 'store_order_id', 'id');
    }
}
