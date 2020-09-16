<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function restaurant(Restaurant $restaurant)
    {
        return view('front.restaurant.restaurant',compact('restaurant'));
    }

    public function restaurants()
    {
        $restaurants=Restaurant::all();
        return view('front.restaurant.restaurants',compact('restaurants'));
    }

    public function getallrestaurant()
    {
        $restaurants=Restaurant::paginate(9);
        return response()->json($restaurants);
    }
    public function restaurantproducts($id,$category)
    {
        $restaurant=Restaurant::where('id',$id)->first();
        $products=Product::where('restaurant_id',$id)->where('category_id',$category)->get();
        return response()->json($products);
    }


}
