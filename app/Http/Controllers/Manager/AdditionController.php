<?php

namespace App\Http\Controllers\Manager;

use App\Addition;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class AdditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $additions=Addition::all();
        return view('admin.addition.index',compact('additions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addition.create');
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
            'product_id'=>'required',
            'name'=>'required',
            'type'=>"required|in:paid,free",
            'price'=>'required_if:type,paid'
        ]);
        $product=Product::where('id',$request->product_id)->first();
        $product->additions()->create(['name'=>$request->name,'type'=>$request->type,'price'=>$request->price]);
        return redirect('/admin/addition');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function show(Addition $addition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function edit(Addition $addition)
    {
        return view('admin.addition.edit',compact('addition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addition $addition)
    {
        $this->validate($request,[
            'product_id'=>'required',
            'name'=>'required',
            'type'=>"required|in:paid,free",
            'price'=>'required_if:type,paid'
        ]);
        $product=Product::where('id',$request->product_id)->first();
        $product->additions()->create(['name'=>$request->name,'type'=>$request->type,'price'=>$request->price]);
        return redirect('/admin/addition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Addition  $addition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addition $addition)
    {
        $addition->delete();
        return back();
    }
}
