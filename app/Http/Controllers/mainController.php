<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;
use Hash;
use Session;

class mainController extends Controller
{
    public function index(){
        return view("index");
    }
    public function register_form(){
        return view("register");
    }
    public function register(Request $request){
        $validated=$request->validate([
            "name"=>'required',
            "id"=>"required|unique:admin",
            "email"=>"required|email|unique:admin",
            "contact_no"=>"required|unique:admin",
            "address"=>"required",
            "password"=>"required|min:3|max:12"
        ]);
        $admin=new Admin;
        $admin->name=$request['name'];
        $admin->id=$request['id'];
        $admin->email=$request['email'];
        $admin->contact_no=$request['contact_no'];
        $admin->address=$request['address'];
        $admin->password=Hash::make($request['password']);
        $res=$admin->save();
        if($res){
            return redirect('/')->with('success','Registered Successfully Completed');
        }
        else{
            return redirect('register')->with('error',"Something Wrong");
        }
    }
    public function login_form(){
        return view("login");
    }
    public function dashboard(){
        return view("dashboard");
    }
    public function login(Request $request){
        $validated=$request->validate([
            "id"=>"required",
            "password"=>"required"
        ]);
        $admin= new Admin;
            $admin=Admin::where('id','=',$request->id)->first();
            if($admin){
                if(Hash::check($request->password,$admin->password)){
                    $request->session()->put('id',$admin->id);
                    return redirect('dashboard')->with('success',"Welcome");
                }else{
                    return redirect('login')->with('error',"Enter Valid Password");
                }
            }
            else{
                return redirect('login')->with('error',"This Email is not Registered");
            }
            // if(is_null($admin)){
            //     return redirect('login')->with('error',"Invalid Institute ID");
            // }else{
                // $admin=Admin::where('email','=',$email)->get();
                // $data1=compact('customer');
                // $data=json_decode($customer,true);

                // if($data[0]['password']==$request['password']){
                    // session($data);
                    // $request->session()->put('login','success');
                    // return view('customer_dashboard')->with($data1);
                // }
                
            // }
    }
}