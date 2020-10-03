<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'pic_name', 'pic_phone'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
