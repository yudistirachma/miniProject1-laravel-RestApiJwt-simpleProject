<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::get();
        return response($suppliers, 200);
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
            'name' => ['required', 'string', 'max:255'],
            'pic_name' => ['required', 'string', 'max:255'],
            'pic_phone' => ['required', 'regex:/^08[0-9]{8,11}$/i']
        ]);

        $supplier = Supplier::create($request->only('name', 'pic_name', 'pic_phone'));

        return response($supplier, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return response($supplier, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'pic_name' => ['string', 'max:255'],
            'pic_phone' => ['regex:/^08[0-9]{8,11}$/i']
        ]);

        if (!$request->all()) {
            return response('No parameter', 422);
        }

        $supplier->update([
            'name' => $request->input('name', $supplier->name),
            'pic_name' => $request->input('pic_name', $supplier->pic_name),
            'pic_phone' => $request->input('pic_phone', $supplier->pic_phone),
        ]);

        return response($supplier, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplierOld = $supplier;
        $supplier->delete();

        return response("$supplierOld->name has deleted", 200);
    }
}
