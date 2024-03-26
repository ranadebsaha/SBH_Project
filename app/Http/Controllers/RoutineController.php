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
            "max_class_day" => 'required',
            "break_time_start" => 'required'
        ]);
        // $temp2 = Routine::where('institute_id', '=', Session::get('id'))->where('status', '=', '1')->where('routine_id','=','kdiit123')->get();
        // $temp2=json_decode($temp2);
        // $temp=json_decode($temp);
        // dd($temp2);
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
        $max_class_day = $request['max_class_day'];
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        // dd($weekend);
        
        foreach ($days as $day) {
            $st = 0;
            foreach ($weekend as $w) {
                if ($day == $w) {
                    $st = 1;
                }
            }
            //weekwnd check
            if($st==1){
                break;
            }
            for($d=0;$d<$max_class_day;$i++){
            //check class timing
            if ($class_start + $class_time <= $class_close && ($class_start + $break_time <= $break_time_start || $class_start>=$break_time_start+$break_time)) {
            for ($i = 1; $i <= $class_no; $i++) {
                $teacher='teacher_'.$i+1;
                    $temp = Routine::where('institute_id', '=', Session::get('id'))->where('day', '=', $day)->where($teacher, '=', $data[$teacher])->where('status', '=', '1')->get();
                    $temp=json_decode($temp);
                    //check teacher free or not in this time slot
                    if (is_null($temp)) {
                        $temp2 = Routine::where('institute_id', '=', Session::get('id'))->where('status', '=', '1')->where('routine_id','=',$routine_id)->get();
                        $temp2=json_decode($temp2);
                        $sub=0;
                        foreach($temp2 as $r){
                                for ($j = 1; $j <=$max_class_day; $j++){
                                if($r['subject_'.$j]==$data['subject_'.$i]){
                                    $sub=$sub+1;
                                    continue;
                                }  
                            }
                        }
                        //check the class limit of this subject is over or not
                        if($sub<$max_class_week){
                            $temp3 = Routine::where('institute_id', '=', Session::get('id'))->where('status', '=', '1')->where('day','=',$day)->get();
                            $temp3=json_decode($temp3);
                            $tch=0;
                            foreach($temp3 as $r){
                                    for ($j = 1; $j <=$max_class_day; $j++){
                                    if($r['teacher_'.$j]==$data['teacher_'.$i]){
                                        $tch=$tch+1;
                                        continue;
                                    }  
                                }
                            }
                            //check the class limit of teacher is over or not
                            if($tch<$max_class_teacher){
                                $temp4 = Routine::where('institute_id', '=', Session::get('id'))->where('status', '=', '1')->where('routine_id','=',$routine_id)->where('day','=',$day)->get();
                                $temp4=json_decode($temp4);
                                $dsub=0;
                                for ($j = 1; $j <=$max_class_day; $j++){ 
                                if($temp4['subject_'.$j]==$data['subject_'.$i]){
                                    $dsub=1;
                                    break;
                                }
                            }
                            //check the subject is first on this day or not
                            if($dsub==0){
                                //store routine into the database
                                $newsub='subject_'.$d+1;
                                $newtch='teacher_'.$d+1;
                                $newtime='timing_'.$d+1;
                                $routine=New Routine;
                                $routine->$newsub = $data['subject_'.$i];
                                $routine->$newtch=$data['teacher_'.$i];
                                $routine->$newtime=$class_start;
                                //change time
                                $class_start=strtotime($class_start)-strtotime('TODAY');
                                $class_time=$class_time*60;
                                $class_start=$class_start+$class_time;
                                $hrs=$class_start/60;
                                $mins=$hrs%60;
                                $hrs=$hrs/60;
                                $class_start=(int)$hrs.":".$mins;
                            }  
                            }
                        
                    }
                }
            }
        }
    }
    }
}
}