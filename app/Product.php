<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'slug', 'price', 'stock'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sellItems() {
        return $this->hasMany(SellItem::class);
    }

    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
}
