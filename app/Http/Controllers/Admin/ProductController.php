<?php

namespace App\Http\Controllers\Admin;

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
        $products=Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'images'=>'required',
            'price'=>'required',
        ]);
        $product=new product();
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->active=$request->active;
        $product->price=$request->price;
        $product->slug=$request->name.rand(1111,9999);
        $product->save();
           if ($request->images) {
            foreach ($request->images as $key =>$value ) {
                $product->gallery()->create(['url'=>sorteimage('storage/product',$value)]);
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
        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
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
            'images'=>'nullable',
            'price'=>'required',
        ]);
        $product->category_id=$request->category_id;
        $product->name=$request->name;
        $product->description=$request->description;
        $product->active=$request->active;
        $product->price=$request->price;
        $product->slug=$request->name.rand(1111,9999);
        $product->save();
           if ($request->images) {
            foreach ($request->images as $key =>$value ) {
                $product->gallery()->create(['url'=>sorteimage('storage/product',$value)]);
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
        return redirect('/admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
