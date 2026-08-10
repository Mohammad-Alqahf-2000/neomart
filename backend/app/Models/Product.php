<?php

namespace App\Models;

use App\Enums\ProductAvailabilityEnum;
use App\Enums\ProductTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['en_name', 'ar_name', 'en_description', 'ar_description', 'stock', 'price', 'type', 'availability', 'sub_category_id', 'brand_id', 'store_id'];

    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        "stock" => "integer",
        "price" => "decimal:2",
        "type" => ProductTypeEnum::class,
        "availability" => ProductAvailabilityEnum::class,
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, "brand_id", "id");
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, "sub_category_id", "id");
    }
    public function store()
    {
        return $this->belongsTo(Store::class, "store_id", "id");
    }
}
