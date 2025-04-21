<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'postcode' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'shipping' => 'required',
            'payment' => 'required',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }

        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $shippingCost = $request->input('shipping') == 'free' ? 0 : ($request->input('shipping') == 'flat' ? 15 : 8);
        $total = $subtotal + $shippingCost;

        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending',
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'postcode' => $request->postcode,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'order_notes' => $request->order_notes,
            'shipping_method' => $request->shipping,
            'shipping_cost' => $shippingCost,
            'payment_method' => $request->payment,
        ]);

        foreach ($cart as $productId => $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }

        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}