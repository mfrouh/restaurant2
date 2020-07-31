<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function setting()
    {
        return view('setting');
    }

    public function changepassword(Request $request)
    {
        $this->validate($request,[
             'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        if (Hash::check($request->oldpassword,$user->password )) {
        $user->password=Hash::make($request->password);
        $user->save();
             return redirect('/setting')->with('success','تمت تغير كلمة المرور بنجاح');
        }
        else {
            return redirect('/setting')->with('success','نريد كلمة المرور الحالية');
        }

    }
    public function changeinformation(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->user()->id,
            'image'=>'image|nullable',
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();
        if($request->image)
        {
            $user->image()->update(['url'=>sorteimage('storage/user',$request->image)]);
        }
        return redirect('/setting')->with('success','تمت التعديل بنجاح');
    }

}
