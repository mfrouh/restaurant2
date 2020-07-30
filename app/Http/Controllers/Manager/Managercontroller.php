<?php

namespace App\Http\Controllers\Manager;

use App\Employee;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Managercontroller extends Controller
{
    public function addemployee()
    {
        return view('manager.pages.addemployee');
    }
    public function employee()
    {
        $employees=employee::where('restaurant_id',auth()->user()->restaurant->id)->get('user_id');
        $users=User::whereIn('id',$employees)->get();
        return view('manager.pages.employee',compact('users'));
    }
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
        $user->image()->create(['url'=>sorteimage('storage/user/',$request->image)]);
        $employee=new Employee();
        $employee->user_id=$user->id;
        $employee->restaurant_id=auth()->user()->restaurant->id;
        $employee->save();
        return redirect('/manager/employee')->with('success','تمت الاضافة بنجاح');
    }

    public function update(Request $request,User $user)
    {
         $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role'=>'required|in:delivery,chef',
            'image'=>'image|nullable',
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->save();
        $user->image()->update(['url'=>sorteimage('storage/user/',$request->image)]);
        return redirect('/manager/employee')->with('success','تمت التعديل بنجاح');
    }
    public function changepassword(Request $request,User $user)
    {
        $this->validate($request,[
             'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
      if (Hash::check($request->oldpassword,$user->password )) {
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect('/manager/employee')->with('success','تمت تغير كلمة المرور بنجاح');
        }

    }
    public function destroy(User $user)
    {
        $user->employee()->delete();
        $user->delete();
        return redirect('/manager/employee')->with('success','تمت المسح بنجاح');
    }
    public function block(User $user)
    {
        $user->employee()->delete();
        $user->delete();
        return redirect('/manager/employee')->with('success','تمت المسح بنجاح');
    }

}
