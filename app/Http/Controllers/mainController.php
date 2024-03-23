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
        $customer=new Admin;
        $customer->name=$request['name'];
        $customer->id=$request['id'];
        $customer->email=$request['email'];
        $customer->contact_no=$request['contact_no'];
        $customer->address=$request['address'];
        $customer->password=$request['password'];
        $customer->save();
        return redirect('/');
    }
}
