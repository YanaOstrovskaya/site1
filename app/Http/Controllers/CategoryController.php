<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function show($slug){

    	$category = Category::where('slug', $slug)->first();
    	$products = Product::where('category_id', $category->id)->paginate(3);
    	return view('category.show', compact('category', 'products'));
    }
}
