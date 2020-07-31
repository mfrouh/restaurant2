<?php

namespace App\Http\Controllers\Manager;

use App\Addition;
use App\Category;
use App\Http\Controllers\Controller;
use App\Option;
use App\Order;
use App\Order_details;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard()
    {
      return view('manager.pages.dashboard');
    }

    public function orders()
    {
        $orders=Order::where('restaurant_id',auth()->user()->restaurant->id)->get();
        return view('manager.pages.orders',compact('orders'));
    }

    public function order_details($id)
    {
        $order_details=Order_details::where('order_id',$id)->get();
        return view('manager.pages.order_details',compact('order_details'));
    }

    public function clients()
    {
        $clients=User::where('role','client')->get();
        return view('manager.pages.clients',compact('clients'));
    }
    public function value()
    {
        $values=Option::all();
        return view('manager.pages.value',compact('values'));
    }
    public function tag()
    {
        $tags=Tag::all();
        return view('manager.pages.tags',compact('tags'));
    }
    public function category()
    {
        $categories=Category::all();
        return view('manager.pages.category',compact('categories'));
    }
    
}
