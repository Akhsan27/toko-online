<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name', 'slug', 'image', 'is_active'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function allCategory(){
        return $this->hasMany(Product::class);
    }
}
