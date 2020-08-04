<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function all()
    {
        $wishlist=Wishlist::where('user_id',auth()->user()->id)->get();
        return view('front.pages.wishlist',compact('wishlist'));
    }

    public function empty()
    {
        Wishlist::where('user_id',auth()->user()->id)->delete();
        return back();
    }

    public function create(Product $product)
    {
        $wishlist=Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product->id)->first();
        if($wishlist){
        $wishlist=new Wishlist();
        $wishlist->user_id=auth()->user()->id;
        $wishlist->product_id=$product->id;
        $wishlist->save();
        return back();
        }
        else
        {
         $wishlist->delete();
         return back();
        }
    }

    public function destroy($id)
    {
        Wishlist::where('id',$id)->delete();
        return back();

    }
}
