<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\DiscountCode;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
   public function store(Request $request) {

    $cart = session()->get('cart', []);
    $data = [$request, $cart];

    $order = Order::create([
        'user_id' => Auth::user()->id,
        'billing_email' => $request->email,
        'billing_name' => $request->first_name.' '.$request->last_name,
        'address_line_1' => $request->address_line_1,
        'address_line_2' => $request->address_line_2,
        'city' => $request->city,
        'county' => $request->county,
        'postcode' => $request->postcode,
        'discount' => $request->discount,
        'tax' => $request->tax,
        'total' => $request->total,
        'status' => 'New',
        'type' => $request->type,
        'shipped' => false
    ]);

    foreach ($cart as $cartItem) {
        OrderProduct::create([
            'order_id' => $order->id,
            'product_id' => $cartItem['id'],
            'quantity' => $cartItem['quantity']
        ]);
    }

    dd('SUCCESS');
   }
}
