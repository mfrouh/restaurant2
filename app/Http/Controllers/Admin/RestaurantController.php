<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants=Restaurant::all();
        return view('admin.restaurant.index',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'required|image',
            'address'=>'required',
            'phone'=>'required|min:11|max:11',
            'state'=>'required|in:open,close',
            'delivery'=>'required|in:0,1',
         ]);
         $restaurant=new Restaurant();
         $restaurant->name=$request->name;
         $restaurant->address=$request->address;
         $restaurant->phone=$request->phone;
         $restaurant->state=$request->state;
         $restaurant->delivery=$request->delivery;
         $restaurant->save();
         if ($request->image) {
            $restaurant->image()->create(["url" => sorteimage('storage/restaurant',$request->image)]);
         }
         return redirect('/admin/restaurant')->with('succes','Store Restaurant');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('admin.restaurant.edit',compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'nullable|image',
            'address'=>'required',
            'phone'=>'required|min:11|max:11',
            'state'=>'required|in:open,close',
            'delivery'=>'required|in:0,1',
         ]);
         $restaurant=new Restaurant();
         $restaurant->name=$request->name;
         $restaurant->address=$request->address;
         $restaurant->phone=$request->phone;
         $restaurant->state=$request->state;
         $restaurant->delivery=$request->delivery;
         $restaurant->save();
         if ($request->image) {
            $restaurant->image()->create(["url" => sorteimage('storage/restaurant',$request->image)]);
         }
         return redirect('/admin/restaurant')->with('succes','Update Restaurant');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return back();
    }
}
