<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;

use App\Models\Admin;

class AdminController extends Controller
{
    function login(Request $request){
        
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where([
            ['name',"=", $request->name],
            ['password',"=", $request->password],
        ])->first();

        if(!$admin){
             $validation = $request->validate([
            'user' => 'required',
        ],[
            'user.required' => 'User does not exist',
        ]);
        }
        Session::put('admin',$admin);
        return redirect('dashboard');
    }

}
