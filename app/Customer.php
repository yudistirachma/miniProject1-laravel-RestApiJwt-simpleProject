<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'fullname', 'bod', 'gender', 'transaction_sum', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function sells() {
        return $this->hasMany(Sell::class);
    }
}
