<?php

namespace App\Http\Controllers\Manager;

use App\Employee;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Managercontroller extends Controller
{
   
    public function block(User $user)
    {
        $user->delete();
        return redirect('/manager/employee')->with('success','تمت المسح بنجاح');
    }

}
