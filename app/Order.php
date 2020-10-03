<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const PAYMENT_CASH = 'CASH';
    const PAYMENT_TOP = 'TOP';
    const PAYMENTS = [self::PAYMENT_CASH, self::PAYMENT_TOP];


    protected $fillable = [
        'supplier_id', 'total', 'due_date', 'payment'
    ];

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
