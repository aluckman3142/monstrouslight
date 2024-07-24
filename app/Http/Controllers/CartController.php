<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\DiscountCode;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class CartController extends Controller
{

    public function cart() {

        return Inertia::render('Cart', []);
    }

    public function checkout(Request $request) {

        if ($request->discountCode){
            
            $discountCode = $request->discountCode;
            $now = Carbon::now();
            $validCodes = DiscountCode::where('enabled', '=', 1)->where('start_date', '<', $now)->where('end_date', '>', $now)->pluck('code')->toArray();

            if (in_array($discountCode, $validCodes)){

                $code = DiscountCode::where('code', '=', $discountCode)->first();
            
                return Inertia::render('Checkout', [
                    'code' => $code,
                ]);

            } else {

                return redirect()->route('cart')->with('message', 'Invalid Voucher Code');
            }
            
        } else {
            return Inertia::render('Checkout', []);
        }

    }

    public function addToCart($id) {
      
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])){

            $cart[$id]['quantity']++;
            
        } else {

            $cart[$id] = [
               'id' => $product->id,
               'title' => $product->title,
               'slug' => $product->slug,
               'quantity' => 1,
               'price' => $product->sell_price,
               'image' => $product->images[0], 
            ];

        }
        
        session()->put('cart', $cart);

        $message = [
            'id' => rand(1, 9999),
            'message' => 'Added To Cart Successfully',
            'product' => $product,
            'cart' => true
        ];


        return redirect()->back()->with('message', $message);

    }

    public function removeFromCart($id) {

        $cart = session()->get('cart');
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('message', 'Product Removed From Cart Successfully');

    }

    public function updateCart(Request $request){

        if ($request->id && $request->quantity){

            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);

        }
        
    }

    public function applyDiscount(Request $request){

        $discountCode = $request->discountCode;

        $now = Carbon::now();

        $validCodes = DiscountCode::where('enabled', '=', 1)->where('start_date', '<', $now)->where('end_date', '>', $now)->pluck('code')->toArray();

        if (in_array($discountCode, $validCodes)){

            $code = DiscountCode::where('code', '=', $discountCode)->first();

            return redirect()->route('cart')->with('code', $code);
        
        } else {
        
            return redirect()->route('cart')->with('message', 'Invalid Voucher Code');
        
        }
        
    }
}
