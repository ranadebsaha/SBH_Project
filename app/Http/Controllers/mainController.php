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
    public function index()
    {
        if (Session::has('id')) {
            return redirect()->back();
        }
        else{
            Session::pull('id');
        return view("index");
        }
    }
    public function register_form()
    {
        if (Session::has('id')) {
            return redirect()->back();
        }
        else{
            Session::pull('id');
            return view("register");
        }
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            "name" => 'required',
            "id" => "required|unique:admin",
            "email" => "required|email|unique:admin",
            "contact_no" => "required|unique:admin",
            "address" => "required",
            "password" => "required|min:3|max:12"
        ]);
        $admin = new Admin;
        $admin->name = $request['name'];
        $admin->id = $request['id'];
        $admin->email = $request['email'];
        $admin->contact_no = $request['contact_no'];
        $admin->address = $request['address'];
        $admin->password = Hash::make($request['password']);
        $res = $admin->save();
        if ($res) {
            return redirect('/')->with('success', 'Registered Successfully Completed');
        } else {
            return redirect('register')->with('error', "Something Wrong");
        }
    }
    public function login_form()
    {
        if (Session::has('id')) {
            return redirect()->back();
        }
        else{
            Session::pull('id');
        return view("login");
        }
    }
    public function login(Request $request)
    {
        $validated = $request->validate([
            "id" => "required",
            "password" => "required"
        ]);
        $admin = new Admin;
        $admin = Admin::where('id', '=', $request->id)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $request->session()->put('id', $admin->id);
                return redirect('dashboard')->with('success', "Welcome");
            } else {
                return redirect('login')->with('error', "Enter Valid Password");
            }
        } else {
            return redirect('login')->with('error', "Enter a Valid or Registered Institute Id");
        }
    }
    public function dashboard()
    {
        $data = array();
        if (Session::has('id')) {
            $data=Admin::where('id', '=', Session::get('id'))->first();
            return view("dashboard",compact('data'));
        }
        else{
            return view('login');
        }
    }
    public function logout(){
        if (Session::has('id')) {
            Session::pull('id');
            return redirect('login');
        }
        else{
            return redirect()->back();
        }
    }
}