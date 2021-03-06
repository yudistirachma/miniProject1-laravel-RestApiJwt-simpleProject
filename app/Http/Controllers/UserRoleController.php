<?php

namespace App\Http\Controllers;

use App\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userRole = UserRole::get();
        return response($userRole, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'role_id' => ['required', 'integer'],
        ]);

        $userRole = UserRole::create($request->only('user_id', 'role_id'));

        return response($userRole, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        return response($userRole, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,UserRole $userRole)
    {
        $request->validate([
            'user_id' => ['required', 'integer'],
            'role_id' => ['required', 'integer'],
        ]);

        if (!$request->all()) {
            return response('No parameter', 422);
        }
        $userRole->update([
            'user_id' => $request->input('user_id', $userRole->user_id),
            'role_id' => $request->input('role_id', $userRole->role_id),
        ]);

        return response($userRole, 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $userRole)
    {
        $userRoleOld = $userRole;
        $userRole->delete();

        return response("$userRoleOld->id has deleted", 200);
    }
}
