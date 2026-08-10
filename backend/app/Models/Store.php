<?php

namespace App\Models;

use App\Enums\StoreOrderTaxTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /** @use HasFactory<\Database\Factories\StoreFactory> */
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = ['name', 'en_description', 'tax_rate', 'tax_type', 'ar_description', 'logo', 'user_id'];

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        "tax_type" => StoreOrderTaxTypeEnum::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function storeOrders()
    {
        return $this->hasMany(StoreOrder::class, 'order_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, "store_id", 'id');
    }
}
