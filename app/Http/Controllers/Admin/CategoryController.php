<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required|unique:categories',
            'image'=>'image|required',
            'parent_id'=>'nullable',
            'active'=>'required|in:0,1',
        ]);
        $category=new Category();
        $category->name=$request->name;
        $category->active=$request->active;
        $category->parent_id=$request->parent_id;
        $category->save();
        if ($request->image) {
             $category->image()->create(['url'=>sorteimage('storage/category',$request->image)]);
        }
        return redirect('/admin/category')->with('success','Store Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name'=>'required|unique:categories,name,'.$category->id,
            'image'=>'image|nullable',
            'parent_id'=>'nullable',
            'active'=>'required|in:0,1',
        ]);
        $category->name=$request->name;
        $category->active=$request->active;
        $category->parent_id=$request->parent_id;
        $category->save();
        if ($request->image) {
            $category->image()->update(['url'=>sorteimage('storage/category',$request->image)]);
        }
        return redirect('/admin/category')->with('success','Update Success');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
