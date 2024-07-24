<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        $low_stock_products = Product::query()->where('stock', '<', 2)->orderBy('id')->get();
        return Inertia::render('Admin/Dashboard', [
            'low_stock_products' => $low_stock_products,
        ]);
    }

}
