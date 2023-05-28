<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Favorites extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id'
    ];

    public function getFavorites(): HasMany
    {
        return $this->hasMany(Product::class,'id', 'product_id');
    }
}
