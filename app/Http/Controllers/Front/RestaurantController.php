<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
    public function restaurantproducts($id)
    {
        $restaurant=Restaurant::where('id',$id)->first();
        return response()->json($restaurant->products);
    }


}
