<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutineController extends Controller
{
    public function details(){
        return view('Routine/form');
    }
    public function details_save(Request $request){
        $data=$request->validate([
            'classroom'=>'required',
            'class_start'=>'required',
            'class_close'=>'required',
            'break_time'=>'required',
            'weekend'=>'required',
            'class_time'=>'required'
        ]);
        dd($data);
    }
}
