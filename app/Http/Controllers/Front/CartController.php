<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function all()
   {
    return view('front.pages.cart');
   }

   public function empty()
   {
       Cart::clear();
       return back();
   }

   public function create(Request $request)
   {
       Cart::CreateORUpdate($request->product,$request->variant,$request->quantity);
       return back();
   }
    
   public function destroy($id)
   {
      Cart::destroy($id);
      return back();
   }
}
