<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariantController extends Controller
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
        $variants=variant::all();
        return view('admin.variant.index',compact('variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.variant.create',compact('product'));
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
            'price'=>'required',
            'qty'=>'required',
            'product_id'=>'required',
        ]);
        $sku="";
        foreach ($request->all() as $key => $value) {
            if(is_int($key)==true){
                $sku .= $request->product_id.$key.$value;
            }
        }
        $variant=variant::where('sku',$sku)->first();
        if(!$variant){
        $variant=new variant();
        $variant->price=$request->price;
        $variant->qty=$request->qty;
        $variant->product_id=$request->product_id;
        $variant->sku=$sku;
        $variant->save();
        if ($request->images) {
            foreach ($request->images as $key =>$value ) {
                $variant->image()->create(['url'=>sorteimage('storage/product',$value)]);
            }
           }
        foreach ($request->all()  as $key => $value) {
            if(is_int($key)==true){
               DB::insert('insert into variant_valueable (variant_id,valueable_id) values (?, ?)', [$variant->id,$value]);
            }
        }
            return redirect('/admin/variant')->with('success','تمت الاضافة');
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
    public function show(Variant $variant)
    {
        return view('admin.variant.show',compact('variant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Variant $variant)
    {
        return view('admin.variant.edit',compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Variant $variant)
    {
        $this->validate($request,[
            'price'=>'required',
            'qty'=>'required',
            'product_id'=>'required',
        ]);
        $variant->price=$request->price;
        $variant->qty=$request->qty;
        $variant->product_id=$request->product_id;
        $variant->save();
        if ($request->images) {
            foreach ($request->images as $key =>$value ) {
                $variant->image()->create(['url'=>sorteimage('storage/product',$value)]);
            }
           }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variant $variant)
    {
        $variant->delete();
        return back();
    }
}
