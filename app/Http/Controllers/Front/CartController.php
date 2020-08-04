<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function all()
   {
    $cart=Cart::content();
    return view('front.pages.cart',compact('cart'));
   }

   public function empty()
   {
       Cart::clear();
       return back();
   }

   public function create(Request $request)
   {
       Cart::CreateORUpdate($request->product,$request->variant,$request->additions,$request->quantity);
       return back();
   }
    
   public function destroy($id)
   {
      Cart::destroy($id);
      return back();
   }
}
