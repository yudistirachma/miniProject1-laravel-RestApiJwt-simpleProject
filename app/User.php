<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    protected $keyType = 'phone';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function roles(){
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }

    public function cek_route($route_name){
        $route_id = Route::where('name_route', $route_name)->get();
        if ($route_id->isEmpty()) {
            return false;
        }

        $route_id = $route_id->first()->id;
        $roles = $this->roles;

        $cek = false;

        if ($roles) {
            foreach ($roles as $role) {
                foreach ($role->routes as $route) {
                    if ($route_id == $route->id) {
                        $cek = true;
                    }
                }
            }
        }

        return $cek;
    }

    public function customer() {
        return $this->hasOne(Customer::class);
    }

    public function employee() {
        return $this->hasOne(Employee::class);
    }
}
