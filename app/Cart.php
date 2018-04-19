<?php

namespace App;

use Illuminate\Support\Facades\Session;

class Cart 
{
    public static function add($product, $qty){
    	if(Session::get('cart.pr_'.$product->id)){
    		$qtyOld = Session::get('cart.pr_'.$product->id.'.qty');
    		Session::put('cart.pr_'.$product->id.'.qty', $qtyOld+$qty);
    	}
    	else{
    	Session::put('cart.pr_'.$product->id.'.product_id', $product->id);
    	Session::put('cart.pr_'.$product->id.'.qty', $qty);
    	Session::put('cart.pr_'.$product->id.'.name', $product->name);
    	Session::put('cart.pr_'.$product->id.'.price', $product->price);
    	Session::put('cart.pr_'.$product->id.'.salePrice', $product->salePrice);
    	Session::put('cart.pr_'.$product->id.'.imagePath', $product->imagePath);
    	}
    	self::totalSum();
    }

    public static function totalSum()
    {
    	$total = 0;
    	foreach (Session::get('cart') as $product) {
    		$total+=$product['qty'] * $product['price'];
    	}
    	Session::put('totalSum', $total);
    }





}
