<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Supplier;
use Illuminate\Http\Request;

class OrderController extends Controller
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
            'supplier' => ['exists:suppliers,id'],
            'payment' => ['required', 'in:CASH,TOP'],
            'due_date' => ['date', 'required_if:payment,==,TOP'],
            'carts' => ['required', 'array'],
            'carts.*.product' => ['exists:products,id'],
            'carts.*.qty' => ['numeric', 'min:0'],
        ]);

        $supplier = $request->has('supplier') ? Supplier::findOrFail($request->supplier)->id : null;

        $order = Order::create([
            'supplier_id' => $supplier,
            'payment' => $request->payment,
            'due_date' => $request->input('due_date', null)
        ]);

        $total = 0;
        foreach($request->carts as $cart) {
            $product = Product::findOrFail($cart['product']);
            $subTotal = $product->price * $cart['qty'];

            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'qty' => $cart['qty'],
                'total' => $subTotal,
            ]);

            $stockNew = $product->stock + $cart['qty'];
            $product->update(['stock' => $stockNew]);
            $total += $subTotal;
        }

        $order->update(['total' => $total]);

        return response($order->load('items'), 201);
    }
}
