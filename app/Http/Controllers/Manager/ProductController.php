<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::where('restaurant_id',auth()->user()->restaurant->id)->get();
        return view('manager.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.product.create');
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
            'category_id'=>'required|numeric',
            'name'=>'required',
            'description'=>'required',
            'active'=>'required|between:0,1',
            'image'=>'required',
            'price'=>'required',
        ]);
        $product=new product();
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->restaurant_id=auth()->user()->restaurant->id;
        $product->description=$request->description;
        $product->active=$request->active;
        $product->price=$request->price;
        $product->slug=$request->name;
        $product->save();
           if ($request->image) {
                $product->image()->create(['url'=>sorteimage('storage/product',$request->image)]);
           }
           if ($request->tags) {
            foreach (explode(',',$request->tags) as $key =>$value ) {
                $tag=Tag::where('name',$value)->first();
                if(!$tag)
                {
                    $tag=Tag::create(['name'=>$value]);
                }
                $arr[]=$tag->id;
            }
            $product->tags()->sync($arr);
           }
        return redirect('/manager/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(auth()->user()->restaurant->id==$product->restaurant_id){
            return view('manager.product.show',compact('product'));
        }else
        {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if(auth()->user()->restaurant->id==$product->restaurant_id){
            return view('manager.product.edit',compact('product'));
        }else
        {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'category_id'=>'required|numeric',
            'name'=>'required',
            'description'=>'required',
            'active'=>'required|between:0,1',
            'image'=>'nullable',
            'price'=>'required',
        ]);
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->restaurant_id=auth()->user()->restaurant->id;
        $product->description=$request->description;
        $product->active=$request->active;
        $product->price=$request->price;
        $product->slug=$request->name.rand(1111,9999);
        $product->save();
           if ($request->image) {
               if($product->image){
                $product->image()->update(['url'=>sorteimage('storage/product',$request->image)]);
               }
               else
               {
                $product->image()->create(['url'=>sorteimage('storage/product',$request->image)]);
               }
                
           }
           if ($request->tags) {
            foreach (explode(',',$request->tags) as $key =>$value ) {
                $tag=Tag::where('name',$value)->first();
                if(!$tag)
                {
                    $tag=Tag::create(['name'=>$value]);
                }
                $arr[]=$tag->id;
            }
            $product->tags()->sync($arr);
           }
        return redirect('/manager/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(auth()->user()->restaurant->id==$product->restaurant_id){
            $product->delete();
             return back();
        }else
        {
            return abort(404);
        }
       
    }
}
