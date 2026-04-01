<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /** @use HasFactory<\Database\Factories\StoreFactory> */
    use HasFactory;

    protected $table = 'stores';

    protected $fillable = ['en_name', 'ar_name', 'en_description', 'ar_description', 'logo', 'user_id'];

    protected $guarded = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class , 'store_order');
    }
}
