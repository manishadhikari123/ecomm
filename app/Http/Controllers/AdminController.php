<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Order;
class AdminController extends Controller
{
    //

    public function adminlogin(Request $req)
    {
        $admin= Admin::where(['email'=>$req->email,'password'=>$req->password])->first();

        if($admin == null)
        {
            return redirect('/adminlogin?success=false');
        }
        else{
            $req->session()->put('admin',$admin);
            return redirect('/adminlogin');
        }
    }
    
    public function adminlogin1(Request $req)
    {
        $admin= Admin::where(['email'=>$req->email,'password'=>$req->password])->first();
        if($admin == null)
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('admin',$admin);
            return redirect('/admindashboard');
        }
    }

    function show()
    {
        $data= Order::all();
        return view('admin-orderinfo',['orders'=>$data]);
    }

    
}
