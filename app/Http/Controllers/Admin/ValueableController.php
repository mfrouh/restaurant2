<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use App\Product;
use App\Valueable;
use Illuminate\Http\Request;

class ValueableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','role:admin']);
    // }
    public function index()
    {
        $valueables=valueable::all();
        return view('admin.valueable.index',compact('valueables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.valueable.create',compact('product'));
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
            'attribute_id'=>'required',
            'option'=>'required',
            'product_id'=>'required',
        ]);
        $option=Option::where('name',$request->value)->first();
        if(!$option){
        $option= new Option();
        $option->name=$request->value;
        $option->save();
        }
        $valueable_1=valueable::where('product_id',$request->product_id)->where('attribute_id',$request->attribute_id)->where('option_id',$option->id)->first();
        if(!$valueable_1)
        {
            $valueable= new valueable();
            $valueable->product_id=$request->product_id;
            $valueable->attribute_id=$request->attribute_id;
            $valueable->option_id=$option->id;
            $valueable->save();
            return redirect('/admin/valueable');
        }
        else
        {
         return back()->with('success','هذه القيمة موجودة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Valueable $valueable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(valueable $valueable)
    {
        return view('admin.valueable.edit',compact('valueable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Valueable $valueable)
    {
        $this->validate($request,[
            'attribute_id'=>'required',
            'option'=>'required',
            'product_id'=>'required',
        ]);
        $option=Option::where('name',$request->value)->first();
        if(!$option){
        $option= new Option();
        $option->name=$request->value;
        $option->save();
        }
        $valueable_1=valueable::where('product_id',$request->product_id)->where('attribute_id',$request->attribute_id)->where('option_id',$option->id)->first();
        if(!$valueable_1 || $valueable_1==$valueable)
        {
            $valueable->product_id=$request->product_id;
            $valueable->attribute_id=$request->attribute_id;
            $valueable->option_id=$option->id;
            $valueable->save();
            return redirect('/admin/valueable');
        }
        else
        {
         return back()->with('success','هذه القيمة موجودة');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valueable $valueable)
    {
        $valueable->delete();
        return back();
    }
}
