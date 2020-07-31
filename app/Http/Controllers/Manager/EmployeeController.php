<?php

namespace App\Http\Controllers\Manager;

use App\Employee;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::where('restaurant_id',auth()->user()->restaurant->id)->get('user_id');
        $users=User::whereIn('id',$employees)->get();
        return view('manager.employee.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'=>'required|in:delivery,chef',
            'image'=>'image|required',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password= bcrypt($request->password);
        $user->role=$request->role;
        $user->save();
        if($request->image)
        {
          
        $user->image()->create(['url'=>sorteimage('storage/user',$request->image)]);
        }
        $employee=new Employee();
        $employee->user_id=$user->id;
        $employee->restaurant_id=auth()->user()->restaurant->id;
        $employee->save();
        return redirect('/manager/employee')->with('success','تمت الاضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('manager.employee.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role'=>'required|in:delivery,chef',
            'image'=>'image|nullable',
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        if ($request->password) {
            $user->password= bcrypt($request->password);
        }
        $user->role=$request->role;
        $user->save();
        if($request->image)
        {
            $user->image()->update(['url'=>sorteimage('storage/user',$request->image)]);
        }
        return redirect('/manager/employee')->with('success','تمت التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->image()->delete();
        $user->delete();
        return redirect('/manager/employee')->with('success','تمت المسح بنجاح');
    }
}
