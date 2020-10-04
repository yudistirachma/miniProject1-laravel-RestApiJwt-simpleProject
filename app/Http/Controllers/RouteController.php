<?php

namespace App\Http\Controllers;

use App\Role;
use App\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::get();
        return response($route, 200);
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
            'name_route' => ['string', 'required', 'unique:routes'],
        ]);

        $route = Route::create($request->only('name_role'));

        return response($route, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return response($role, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name_route' => ['string', 'required', 'unique:roles'],
        ]);

        if (!$request->all()) {
            return response('No parameter', 422);
        }
        $role->update([
            'name_route' => $request->input('name_route', $role->name_route),
        ]);

        return response($role, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        $routeOld = $route;
        $route->delete();

        return response("$routeOld->id has deleted", 200);
    }
}
