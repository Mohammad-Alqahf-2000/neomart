<?php

namespace App\Models;

use App\Enums\StoreOrderStatusEnum;
use App\Enums\StoreOrderTaxTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOrder extends Model
{
    use HasFactory;

    protected $table = "store_orders";

    protected $fillable = ['shipping_cost', "tax_rate", "tax_amount", 'tax_type', 'total_sub', 'status', "total", "order_id", "store_id"];

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        "shipping_cost" => "float",
        "tax_rate" => "float",
        "tax_type" => StoreOrderTaxTypeEnum::class,
        "tax_amount" => "float",
        "total_sub" => "decimal:2",
        "total" => "decimal:2",
        "status" => StoreOrderStatusEnum::class,

    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function storeOrderItems()
    {
        return $this->hasMany(StoreOrderItem::class, 'store_order_id', 'id');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'store_order_id', 'id');
    }
}
