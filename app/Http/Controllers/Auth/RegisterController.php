<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50', 'string'],
            'phone' => ['required', 'min:6', 'max:50', 'string'],
            'email' => ['required', 'min:3', 'max:50', 'string', 'unique:users', 'email'],
            'password' => ['required', 'min:8', 'alpha_num'],
            
        ]);

        $user = User::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'email' => request('email'),
            'password' => bcrypt(request('password')), 
        ]);

        return response($user, 200);
    }
}
