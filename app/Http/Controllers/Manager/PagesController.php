<?php

namespace App\Http\Controllers\Manager;

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
}
