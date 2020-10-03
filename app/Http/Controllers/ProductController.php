<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return response($products, 200);
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
            'price' => ['required', 'numeric', 'min:0'],
            'stock' => ['required', 'numeric', 'min:0']
        ]);

        $slug = \Str::slug($request->name);
        $request->request->add(['slug' => $slug]);

        $product = Product::create($request->only('name', 'slug', 'price', 'stock'));

        return response($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return response($product, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['string', 'max:255'],
            'price' => ['numeric', 'min:0'],
            'stock' => ['numeric', 'min:0']
        ]);

        if (!$request->all()) {
            return response('No parameter', 422);
        }

        $product->update([
            'slug' => $request->has('name') ? \Str::slug($request->name) : $product->slug,
            'name' => $request->input('name', $product->name),
            'price' => $request->input('price', $product->price),
            'stock' => $request->input('stock', $product->stock),
        ]);

        return response($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productOld = $product;
        $product->delete();

        return response("$productOld->name has deleted", 200);
    }
}
