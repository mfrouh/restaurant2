<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_details;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function changestate(Request $request)
    {
       $order=Order::where('id',$request->order_id)->first();
       $order->state=$request->state;
       $order->save();
       return back()->with('success','تمت');
    }
    public function changedetails(Request $request)
    {
       $order=Order_details::where('id',$request->order_details_id)->first();
       $order->complete=$request->complete;
       $order->save();
       return back()->with('success','تمت');
    }

    public function order()
    {
       $orders=Order::where('restaurant_id',auth()->user()->employee->restaurant->id)->get();
       return view('chef.pages.orders',compact('orders'));
    }
}
