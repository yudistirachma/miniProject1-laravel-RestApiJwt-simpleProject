<?php

namespace App\Http\Controllers\Transaction;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sell;
use App\SellItem;
use Illuminate\Http\Request;

class SellController extends Controller
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
            'customer' => ['exists:customers,id'],
            'discount' => ['numeric', 'min:0'],
            'carts' => ['required', 'array'],
            'carts.*.product' => ['exists:products,id'],
            'carts.*.qty' => ['numeric', 'min:0'],
        ]);

        $customer = $request->has('customer') ? Customer::findOrFail($request->customer)->id : null;

        $sell = Sell::create([ 'customer_id' => $customer ]);

        $total = 0;
        foreach($request->carts as $cart) {
            $product = Product::findOrFail($cart['product']);
            $subTotal = $product->price * $cart['qty'];

            $sellItem = SellItem::create([
                'sell_id' => $sell->id,
                'product_id' => $product->id,
                'qty' => $cart['qty'],
                'total' => $subTotal,
            ]);

            $stockNew = $product - $cart['qty'];
            $product->update(['stock' => $stockNew]);
            $total += $subTotal;
        }

        $total = $request->has('discount') ? $total - $request->discount : $total;
        $sell->update(['total' => $total]);
        $customer->transaction_sum += $total;
        $customer->save();

        return response($sell->load('items'), 201);
    }
}
