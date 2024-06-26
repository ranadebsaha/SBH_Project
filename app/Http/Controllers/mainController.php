<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Details;
use App\Models\Routine;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

class mainController extends Controller
{
    public function index()
    {
        if (Session::has('id')) {
            return redirect('dashboard');
        }
        else{
        return view("index");
        }
    }
    public function register_form()
    {
        if (Session::has('id')) {
            return redirect('dashboard');
        }
        else{
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
        $details= new Details;
        $admin->name = $request['name'];
        $admin->id = $request['id'];
        $admin->email = $request['email'];
        $admin->contact_no = $request['contact_no'];
        $admin->address = $request['address'];
        $admin->password = Hash::make($request['password']);
        $details->institute_id=$request['id'];
        $res = $admin->save();
        $res1 = $details->save();
        if ($res && $res1) {
            return redirect('/')->with('success', 'Registered Successfully Completed');
        } else {
            return redirect('register')->with('error', "Something Wrong");
        }
    }
    public function login_form()
    {
        if (Session::has('id')) {
            return redirect('dashboard');
        }
        else{
        return view('login');
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
            $data1=Routine::where('institute_id','=',Session::get('id'))->get();
            // $data1=json_decode($data1);
            if(empty($data1)){
                return view("dashboard",compact('data'));
            }else{
                // $arr=array();
                return view("dashboard",compact('data'),compact('data1'));
            }
        }
        else{
            return redirect('login');
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