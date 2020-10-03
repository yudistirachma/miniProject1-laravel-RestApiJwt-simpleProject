<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();
        return response($customers, 200);
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
            'user_id' => ['numeric', 'exists:users,id'],
            'fullname' => ['required', 'string', 'max:255'],
            'bod' => ['required', 'date'],
            'gender' => ['required', 'boolean']
        ]);

        $customer = Customer::create($request->only('user_id', 'fullname', 'bod', 'gender'));

        return response($customer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response($customer, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'user_id' => ['numeric', 'exists:users,id'],
            'fullname' => ['string', 'max:255'],
            'bod' => ['date'],
            'gender' => ['boolean']
        ]);

        if (!$request->all()) {
            return response('No parameter', 422);
        }

        $customer->update([
            'user_id' => $request->input('user_id', $customer->user_id),
            'fullname' => $request->input('fullname', $customer->fullname),
            'bod' => $request->input('bod', $customer->bod),
            'gender' => $request->input('gender', $customer->gender),
        ]);

        return response($customer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customerOld = $customer;
        $customer->delete();

        return response("$customerOld->fullname has deleted", 200);
    }
}
