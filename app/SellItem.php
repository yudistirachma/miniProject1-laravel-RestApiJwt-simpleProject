<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellItem extends Model
{
    protected $fillable = [
        'qty', 'total', 'sell_id', 'product_id'
    ];

    public function sell () {
        return $this->belongsTo(Sell::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
