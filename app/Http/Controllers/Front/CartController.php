<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
   public function all()
   {
    $data=['carts'=>Cart::content(),'total'=>Cart::total()];
    return response()->json($data);
   }

   public function empty()
   {
       Cart::clear();
       return back();
   }

   public function create(Request $request)
   {
       Cart::CreateORUpdate($request->product,$request->variant,$request->additions,$request->quantity);
       $data=['carts'=>Cart::content(),'total'=>Cart::total()];
       return response()->json($data);
 
    }
    
   public function destroy($id)
   {
      Cart::destroy($id);
      $data=array();
      $data=['carts'=>Cart::content(),'total'=>Cart::total()];
      return response()->json($data);
   }
}
