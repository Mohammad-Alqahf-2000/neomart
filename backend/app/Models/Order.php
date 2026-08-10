<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['status', 'total_amount', 'note', 'paid_at', 'payment_status', 'user_id'];

    protected $guarded = ['created_at', 'update_at'];

    protected $casts = [
        'status' => OrderStatusEnum::class,
        'payment_status' => PaymentStatusEnum::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function storeOrders()
    {
        return $this->hasMany(StoreOrder::class, 'order_id', 'id');
    }
    public function stores()
    {
        return $this->hasManyThrough(Store::class, StoreOrder::class, "order_id", "id", "id", "store_id");
    }
}
