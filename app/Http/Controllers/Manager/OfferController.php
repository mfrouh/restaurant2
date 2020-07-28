<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers=Offer::all();
        return view('admin.offer.index',compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.offer.create',compact('product'));
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
            'type'=>'required|in:fixed,variable',
            'value'=>'required|numeric',
            'start'=>'required',
            'end'=>'required',
        ]);
        $offer=new Offer();
        $offer->product_id=$request->product_id;
        $offer->type=$request->type;
        $offer->value=$request->value;
        $offer->start=$request->start;
        $offer->end=$request->end;
        $offer->save();
        return redirect('/admin/offer')->with('success','Store Offer');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('admin.offer.edit',compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $this->validate($request,[
            'product_id'=>'required',
            'type'=>'required|in:fixed,variable',
            'value'=>'required|numeric',
            'start'=>'required',
            'end'=>'required',
        ]);
        $offer->product_id=$request->product_id;
        $offer->type=$request->type;
        $offer->value=$request->value;
        $offer->start=$request->start;
        $offer->end=$request->end;
        $offer->save();
        return redirect('/admin/offer')->with('success','Update Offer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
       $offer->delete();
       return back();
    }
}
