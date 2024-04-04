<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class ViewController extends Controller
{
    public function routine()
    {
        return view('Routine/view');
        // if (Session::has('id')) {
        //     return view('Routine/view');
        // }
        // else{
        //     return redirect('login');
        // }
    }
}
