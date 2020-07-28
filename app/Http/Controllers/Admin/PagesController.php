<?php

namespace App\Http\Controllers\Admin;

use App\Addition;
use App\Attribute;
use App\Http\Controllers\Controller;
use App\Offer;
use App\Option;
use App\Order;
use App\Order_details;
use App\Product;
use App\Tag;
use App\User;
use App\Valueable;
use App\Variant;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
      return view('admin.pages.dashboard');
    }

    public function orders()
    {
        $orders=Order::all();
        return view('admin.pages.orders',compact('orders'));
    }

    public function order_details($id)
    {
        $order_details=Order_details::where('order_id',$id)->get();
        return view('admin.pages.order_details',compact('order_details'));
    }

    public function clients()
    {
        $clients=User::all();
        return view('admin.pages.clients',compact('clients'));
    }
    public function value()
    {
        $values=Option::all();
        return view('admin.pages.value',compact('values'));
    }
    public function tag()
    {
        $tags=Tag::all();
        return view('admin.pages.tags',compact('tags'));
    }
    public function addition()
    {
        $additions=Addition::all();
        return view('admin.pages.addition',compact('additions'));
    }
    public function attribute()
    {
        $attributes=Attribute::all();
        return view('admin.pages.attribute',compact('attributes'));
    }
    public function offer()
    {
        $offers=Offer::all();
        return view('admin.pages.offer',compact('offers'));
    }
    public function product()
    {
        $products=Product::all();
        return view('admin.pages.product',compact('products'));
    }
    public function valueable()
    {
        $valueables=Valueable::all();
        return view('admin.pages.valueable',compact('valueables'));
    }
    public function variant()
    {
        $variants=Variant::all();
        return view('admin.pages.variant',compact('variants'));
    }
}
