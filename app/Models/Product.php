<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model

{
    use HasFactory;
    protected $table = 'products';

        protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'description',
        'price',
        'stoks',
        'is_sales',
        'is_active',
        'is_features'
    ];

       public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function brand()
    {
        return $this->belongsTo(Brands::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }

     public function getImageUrlAttribute()
    {
        return asset('storage/images/products/'. $this->images);
    }
}
