<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        return view('front.product.product',compact('product'));
    }

    public function products()
    {
        $products=Product::all();
        return view('front.product.products',compact('products'));
    }
}
