<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){

        //===========We are going to follow those steps===========//
        
        // step 1 validate the form data
        // step 2 attempt to log the user in
        // step 3 If successful then, redirect to their intended location
        // step 4 If not then, redirect back to the login form
        
        //========================================================//

        //step 1
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        //step 2

        $loginData = Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember);
        
        //step 3
        if ($loginData) {
            return redirect()->intended(route('admin.dashboard'));
        }

        //step 4
        return redirect()->back()->withInput($request->only('email', 'remember'));
        
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
