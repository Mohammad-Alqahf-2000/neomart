<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['en_name', 'ar_name', 'en_description', 'ar_description', 'stock', 'price', 'type', 'availability', 'sub_category_id', 'brand_id', 'store_id'];

    protected $guarded = ['created_at', 'updated_at'];

    public function images ()
    {
        return $this->hasMany(Image::class, 'product_id','id');
    }
}
