<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{


    

    function register(Request $req) {
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $password_confirmation = $req->input('password1'); // new input field for confirm password

    
        //     $validatedData = $req->validate([
        //         'name' => 'required|regex:/^[a-zA-Z]+$/',
        //         'email' => 'required|email|unique:users',
        //         'password' => 'required|min:6',
        //     ]);

        // Perform data validation
        if(empty($name) || !preg_match('/^[a-zA-Z\s]+$/', $name)) {
            return redirect('/register?success=false');
        }
    
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect('/register?success=false');
        }
    
        if(empty($password) || strlen($password) < 8) {
            return redirect('/register?success=false');
        }

        // Check if password and confirm password match
    if($password !== $password_confirmation) {
        return redirect('/register?success=false');
    }
    
        
    
        // Check if user already exists
        $user = User::where('email', $email)->first();
        if ($user) {
            return redirect('/register?success=false');
        }
    
        // Create new user
        $newUser = new User;
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = $password;
    
        if ($newUser->save()) {
            return redirect('/login?success=true');
        }   
    
        return redirect('/register?success=false');
    }
    

  

    //login
    public function login(Request $req)
    {
        $user= User::where(['email'=>$req->email,'password'=>$req->password])->first();

        if($user == null)
        {
            return redirect('/login?success=false');
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }

    //this process doesnot work, for learning only used.
    public function login1(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email'
        ]);

        // check if the email and password match
        if ($validatedData['email'] === 'example@domain.com' && $validatedData['password'] === 'password') {
            // redirect to the dashboard page
            return redirect('/');
        } else {
            // show an error message
            return back()->withErrors([
                'message' => 'Wrong email or password. Please try again.'
            ]);
        }
    }
    
    //for admin to add users if he wish
    function addmember(Request $req){
        $validatedData = $req->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);   
        $user = new User;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $user->save();
        return redirect('/adminuserscontrol')->with('success', 'You have been successfully registered new member.');;

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
