<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(){
        return view("index");
    }
    public function register_form(){
        return view("register");
    }
}
