<?php

namespace App\Http\Controllers\Manager;

use App\Employee;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Managercontroller extends Controller
{
   
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

    public function block(User $user)
    {
        $user->delete();
        return redirect('/manager/employee')->with('success','تمت المسح بنجاح');
    }

}
