<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function restaurant(Restaurant $restaurant)
    {
        return view('front.pages.restaurant',compact('restaurant'));
    }

    public function restaurants()
    {
        $restaurants=Restaurant::all();
        return view('front.pages.restaurants',compact('restaurants'));
    }

   
}
