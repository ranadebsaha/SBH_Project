<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function details(){
        return view('Routine/form');
    }
}
