<?php

namespace App\Http\Controllers;

use App\Models\Details;
use App\Models\Routine;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class RoutineController extends Controller
{
    public function details()
    {
        return view('Routine/form');
    }
    public function details_save(Request $request)
    {
        $request->validate([
            'classroom' => 'required',
            'class_start' => 'required',
            'class_close' => 'required',
            'break_time' => 'required',
            'weekend' => 'required',
            'class_time' => 'required'
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
    public function pre()
    {
        return view('Routine/pre');
    }
    public function pre_save(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'class_no' => 'required'
        ]);
        $routine_id = $request->session()->get('id') . date('Y') . strtolower($request['class']);
        $request->session()->put('class_no', $request['class_no']);
        $request->session()->put('routine_id', $routine_id);
        return redirect('/admin/routine/data');
    }
    public function data()
    {
        return view('Routine/data');
    }
    public function data_save(Request $request)
    {
        for ($i = 1; $i <= Session::get('class_no'); $i++) {
            $sub = 'subject_' . $i;
            $tec = 'teacher_' . $i;
            $data[] = $request->validate([
                $sub => 'required',
                $tec => 'required'
            ]);
        }
        $max_class = $request->validate([
            "max_class_teacher" => 'required',
            "max_class_week" => 'required',
            "break_time_start" => 'required'
        ]);

        // $temp=json_decode($temp);
        // dd($temp);
        //Algorithm of Routine
        $routine_id = $request->session()->get('routine_id');
        $class_no = $request->session()->get('class_no');
        $details = Details::where('institute_id', '=', Session::get('id'))->first();
        $details = json_decode($details);
        $institute_id = Session::get('id');
        $class_start = $details->class_start;
        $class_close = $details->class_close;
        $break_time = $details->break_time;
        $class_time = $details->class_time;
        $weekend = json_decode($details->weekend);
        $max_class_teacher = $request['max_class_teacher'];
        $max_class_week = $request['max_class_week'];
        $break_time_start = $request['break_time_start'];
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        // dd($weekend);
        
        foreach ($days as $day) {
            $st = 0;
            foreach ($weekend as $w) {
                if ($day == $w) {
                    $st = 1;
                }
            }
            if($st==1){
                continue;
            }
            if ($class_start + $class_time <= $class_close && ($class_start + $break_time <= $break_time_start || $class_start>=$break_time_start+$break_time)) {
            for ($i = 0; $i < $class_no; $i++) {
                $teacher='teacher_'.$i+1;
                    $temp = Routine::where('institute_id', '=', Session::get('id'))->where('day', '=', $day)->where($teacher, '=', $data[$teacher])->where('status', '=', '1')->get();
                    $temp=json_decode($temp);
                    if (is_null($temp)) {
                        
                        $temp2 = Routine::where('institute_id', '=', Session::get('id'))->where('day', '=', $day)->where($teacher, '=', $data[$teacher])->where('status', '=', '1')->get();
                    }else{
                        continue;
                    }
                }
            }
        }
    }
}
