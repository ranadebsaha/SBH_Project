<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class mainController extends Controller
{
    public function index(){
        return view("index");
    }
    public function register_form(){
        return view("register");
    }
    public function register(Request $request){
        $admin=new Admin;
        $admin->name=$request['name'];
        $admin->id=$request['id'];
        $admin->email=$request['email'];
        $admin->contact_no=$request['contact_no'];
        $admin->address=$request['address'];
        $admin->password=$request['password'];
        $admin->save();
        return redirect('/');
    }
    public function login_form(){
        return view("login");
    }
    public function login(Request $request){
        $validated=$request->validate([
            "id"=>"required",
            "password"=>"required"
        ]);
        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        echo "Invalid Institute Id or Password";
    }
}
