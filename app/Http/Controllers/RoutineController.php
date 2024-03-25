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
    public function pre_save(Request $request){
        $request->validate([
            'class'=>'required',
            'class_no'=>'required'
        ]);
        $routine_id=$request->session()->get('id').date('Y').strtolower($request['class']);
        $request->session()->put('class_no', $request['class_no']);
        $request->session()->put('class', $routine_id);
        return redirect('/admin/routine/data');
    }
    public function data(){
        return view('Routine/data');
    }
    public function data_save(Request $request){
        for($i=1;$i<=Session::get('class_no');$i++){
            $sub='subject'.$i;
            $tec='teacher'.$i;
            $request->validate([
                $sub=>'required',
                $tec=>'required'
            ]);
        }
    }
}
