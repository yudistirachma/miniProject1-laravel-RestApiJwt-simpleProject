<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'fullname', 'bod', 'gender', 'user_id', 'transaction_sum'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sells() {
        return $this->hasMany(Sell::class);
    }
}
