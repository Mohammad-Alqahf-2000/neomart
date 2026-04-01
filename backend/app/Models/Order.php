<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['status', 'total_amount', 'en_note', 'ar_note', 'user_id'];

    protected $guarded = ['created_at', 'update_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_order');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class, 'order_id', 'id');
    }
}
