<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['name_route'];

    // public function roles(){
    //     return $this->belongsToMany('App\Role', 'role_routes', 'route_id', 'role_id');
    // }
}
