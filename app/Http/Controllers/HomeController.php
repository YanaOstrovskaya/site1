<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
         $productsSale=Product::whereNotNull('salePrice')->get();
         $productsRecommended=Product::where('recommended', '=', '1')->get();
        return view('home', compact('productsSale', 'productsRecommended'));
    }
}
