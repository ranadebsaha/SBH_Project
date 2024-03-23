<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

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
        dd($validated);
    }
}
