<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    function register(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();

        return redirect('/login');
    }

    //test
    function login1(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }

    //login
    public function login(Request $req)
    {
        $user= User::where(['email'=>$req->email,'password'=>$req->password])->first();
        if($user == null)
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    
    //for admin to add users if he wish
    function addmember(Request $req){
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->save();
        return redirect('/adminaddmember');

    }
//for admin to delete users, use $id to delete by seperate id
    function deleteuser()
    {
        $data = User::all();
        return view('admindeleteuser',['users'=>$data]);
    }
    function delete1($id)
    {
        $data1 = User::find($id);
        $data1->delete();
        return redirect('admindeleteuser');
    }

    
}
