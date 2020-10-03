<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'fullname', 'bod', 'join_date', 'position', 'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
