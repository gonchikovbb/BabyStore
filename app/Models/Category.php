<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    public function getPopular(): HasManyThrough
    {
        return $this->hasManyThrough(Review::class, Product::class,
        'category_id', 'product_id', 'id','id');
    }
}
