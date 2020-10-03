<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name_role'];

    public function users(){
        return $this->belongsToMany('App\User', 'user_roles', 'role_id', 'user_id');
    }

    public function routes(){
        return $this->belongsToMany('App\Route', 'role_routes', 'role_id', 'route_id');
    }
}
