<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    public function add(Request $request){
    	$product = Product::find($request->product_id);
    	Cart::add($product, $request->qty);
    	return view('cart');
    }
}
