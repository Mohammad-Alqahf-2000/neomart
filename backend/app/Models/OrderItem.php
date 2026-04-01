<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = ['countity', 'price', 'product_id', 'order_id'];

    protected $guarded = ['created_at', 'updated_at'];
}
