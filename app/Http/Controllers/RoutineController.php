<?php

namespace App\Http\Controllers;

use App\Models\Details;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class RoutineController extends Controller
{
    public function details(){
        return view('Routine/form');
    }
    public function details_save(Request $request){
        $request->validate([
            'classroom'=>'required',
            'class_start'=>'required',
            'class_close'=>'required',
            'break_time'=>'required',
            'weekend'=>'required',
            'class_time'=>'required'
        ]);
        $admin = Details::where('institute_id', '=', Session::get('id'))->first();
        $details = Details::find($admin->id);
        $details->classroom = $request['classroom'];
        $details->class_start = $request['class_start'];
        $details->class_close = $request['class_close'];
        $details->break_time = $request['break_time'];
        $details->weekend = json_encode($request->weekend);
        $details->class_time = $request['class_time'];
        $res = $details->save();
        if ($res) {
            return redirect('admin/details')->with('success', 'Registered Successfully Completed');
        } else {
            return redirect('admin/details')->with('error', "Something Wrong");
        }
    }
    public function pre(){
        return view('Routine/pre');
    }
}
