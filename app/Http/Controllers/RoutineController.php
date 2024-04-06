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
        if (Session::has('id')) {
            return view('Routine/form');
        } else {
            return redirect('login');
        }
    }
    public function details_save(Request $request)
    {
        if (Session::has('id')) {
            $request->validate([
                'classroom' => 'required',
                'class_start' => 'required',
                'class_close' => 'required',
                'break_time' => 'required',
                'weekend' => 'required',
                'class_time' => 'required',
                "max_class_teacher" => 'required',
                "break_time_start" => 'required',
                "break_time_end" => 'required'
            ]);
            $admin = Details::where('institute_id', '=', Session::get('id'))->first();
            $details = Details::find($admin->id);
            $details->classroom = $request['classroom'];
            $details->class_start = $request['class_start'];
            $details->class_close = $request['class_close'];
            $details->break_time = $request['break_time'];
            $details->weekend = json_encode($request->weekend);
            $details->class_time = $request['class_time'];
            $details->max_class_teacher = $request['max_class_teacher'];
            $details->break_time_start = $request['break_time_start'];
            $details->break_time_end = $request['break_time_end'];
            $res = $details->save();
            if ($res) {
                return redirect('admin/details')->with('success', 'Registered Successfully Completed');
            } else {
                return redirect('admin/details')->with('error', "Something Wrong");
            }
        } else {
            return redirect('login');
        }
    }
    public function pre()
    {
        if (Session::has('id')) {
            return view('Routine/pre');
        } else {
            return redirect('login');
        }
    }
    public function pre_save(Request $request)
    {
        if (Session::has('id')) {
            $request->validate([
                'class' => 'required',
                'subject_no' => 'required'
            ]);
            $routine_id = $request->session()->get('id') . date('Y') . strtolower($request['class']);
            $request->session()->put('subject_no', $request['subject_no']);
            $request->session()->put('routine_id', $routine_id);
            return redirect('/admin/routine/data');
        } else {
            return redirect('login');
        }
    }
    public function data()
    {
        if (Session::has('id')) {
            return view('Routine/data');
        } else {
            return redirect('login');
        }

    }
    public function data_save(Request $request)
    {
        if (Session::has('id')) {
            for ($i = 1; $i <= Session::get('subject_no'); $i++) {
                $sub = 'subject_' . $i;
                $tec = 'teacher_' . $i;
                $data[] = $request->validate([
                    $sub => 'required',
                    $tec => 'required'
                ]);
            }
            $request->validate([
                "max_class_week" => 'required',
                "max_class_day" => 'required'
            ]);
            //Algorithm of Routine
            $routine_id = $request->session()->get('routine_id');
            $subject_no = $request->session()->get('subject_no');
            $details = Details::where('institute_id', '=', Session::get('id'))->first();
            $details = json_decode($details);
            $institute_id = Session::get('id');
            $class_start = $details->class_start;
            $class_close = $details->class_close;
            $break_time = $details->break_time;
            $class_time = $details->class_time;
            $classroom = $details->classroom;
            $weekend = json_decode($details->weekend);
            $max_class_teacher = $details->max_class_teacher;
            $break_time_start = $details->break_time_start;
            $break_time_end = $details->break_time_end;
            $max_class_day = $request['max_class_day'];
            $max_class_week = $request['max_class_week'];
            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
            //change the time hours:minute to seconds
            $class_start_r = strtotime($class_start) - strtotime('TODAY');
            $class_close = strtotime($class_close) - strtotime('TODAY');
            $break_time_start = strtotime($break_time_start) - strtotime('TODAY');
            $break_time_end = strtotime($break_time_end) - strtotime('TODAY');
            $class_time = $class_time * 60;
            $break_time = $break_time * 60;
            foreach ($days as $day) {
                $st = 0;
                foreach ($weekend as $w) {
                    if ($day == $w) {
                        $st = 1;
                    }
                }

                // weekwnd check
                if ($st == 1) {
                    continue;
                }
                $routine = new Routine;
                //store status, routine and institute id
                $routine->status = 1;
                $routine->routine_id = $routine_id;
                $routine->institute_id = Session::get('id');
                $clroom = Routine::where('institute_id', '=', $institute_id)->where('routine_id', '=', $routine_id)->where('status', '=', '1')->first();
                $clroom = json_decode($clroom);
                //classroom allocate
                if (is_null($clroom)) {
                    $clroom1 = Routine::where('institute_id', '=', Session::get('id'))->where('status', '=', '1')->get();
                    $clroom1 = json_decode($clroom1);
                    if (empty ($clroom1)) {
                        $routine->classroom_no = 1;
                    } else {
                        for ($l = 1; $l <= $classroom; $l++) {
                            $str = 0;
                            foreach ($clroom1 as $rm) {
                                if ($rm->classroom_no == $l) {
                                    $str = 1;
                                    break;
                                }
                            }
                            if ($str == 0) {
                                $routine->classroom_no = $l;
                                break;
                            }
                        }
                    }

                } else {
                    $routine->classroom_no = $clroom->classroom_no;
                }
                $routine->day = $day;
                $routine->save();
            }
            foreach ($days as $day) {
                $st = 0;
                foreach ($weekend as $w) {
                    if ($day == $w) {
                        $st = 1;
                    }
                }
                // weekwnd check
                if ($st == 1) {
                    continue;
                }
                $class_start = $class_start_r;
                $routine = Routine::where('institute_id', '=', $institute_id)->where('routine_id', '=', $routine_id)->where('status', '=', '1')->where('day', '=', $day)->first();
                for ($d = 0; $d < $max_class_day; $d++) {
                    //check break timing
                    if ($class_start >= $break_time_start && $class_start <= $break_time_end) {
                        $hrs = $class_start / 60;
                        $mins = $hrs % 60;
                        $hrs = $hrs / 60;
                        $class_start = (int) $hrs . ":" . $mins;
                        //store break time into the database
                        $routine->break_time = $class_start;
                        $class_start = strtotime($class_start) - strtotime('TODAY');
                        $class_start = $class_start + $break_time;
                    }
                    // check class timing
                    if (($class_start + $class_time) <= $class_close) {
                        $store_data_r = 0;
                        for ($i = 1; $i <= $subject_no; $i++) {
                            if ($store_data_r == 1) {
                                break;
                            }
                            $teacher = 'teacher_' . $i;
                            $temp = Routine::where('institute_id', '=', $institute_id)->where('day', '=', $day)->where($teacher, '=', $data[$i - 1][$teacher])->where('status', '=', '1')->first();
                            $temp = json_decode($temp);
                            //check teacher free or not in this time slot
                            if (is_null($temp)) {
                                $temp2 = Routine::where('institute_id', '=', $institute_id)->where('status', '=', '1')->where('routine_id', '=', $routine_id)->get();
                                $temp2 = json_decode($temp2);
                                $sub = 0;
                                if (empty ($temp2)) {
                                    $sub = 0;
                                } else {
                                    foreach ($temp2 as $r) {
                                        for ($j = 1; $j <= $max_class_day; $j++) {
                                            $sub1 = 'subject_' . $j;
                                            if ($data[$i - 1]['subject_' . $i] == $r->$sub1) {
                                                $sub = $sub + 1;
                                                break;
                                            }

                                        }
                                    }
                                }

                                // check the class limit of this subject is over or not
                                if ($sub < $max_class_week) {
                                    $temp3 = Routine::where('institute_id', '=', $institute_id)->where('status', '=', '1')->where('day', '=', $day)->get();
                                    $temp3 = json_decode($temp3);
                                    $tch = 0;
                                    if (empty ($temp3)) {
                                        $tch = 0;
                                    } else {
                                        foreach ($temp3 as $r) {
                                            for ($j = 1; $j <= $max_class_day; $j++) {
                                                $tch1 = 'teacher_' . $j;
                                                if ($data[$i - 1]['teacher_' . $i] == $r->$tch1) {
                                                    $tch = $tch + 1;
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                    // check the class limit of teacher is over or not
                                    if ($tch < $max_class_teacher) {
                                        $temp4 = Routine::where('institute_id', '=', $institute_id)->where('status', '=', '1')->where('routine_id', '=', $routine_id)->where('day', '=', $day)->first();
                                        $temp4 = json_decode($temp4);
                                        $dsub = 0;
                                        if (is_null($temp4)) {
                                            $dsub = 0;
                                        } else {
                                            for ($j = 1; $j <= $max_class_day; $j++) {
                                                $sub0 = 'subject_' . $j;
                                                if ($data[$i - 1]['subject_' . $i] == $temp4->$sub0) {
                                                    $dsub = 1;
                                                    break;
                                                }
                                            }
                                        }
                                        //check the subject is first on this day or not
                                        if ($dsub == 0) {
                                            //store routine into the database
                                            $newsub = 'subject_' . $d + 1;
                                            $newtch = 'teacher_' . $d + 1;
                                            $newtime = 'timing_' . $d + 1;

                                            $hrs = $class_start / 60;
                                            $mins = $hrs % 60;
                                            $hrs = $hrs / 60;
                                            $class_start = (int) $hrs . ":" . $mins;

                                            $routine->$newsub = $data[$i - 1]['subject_' . $i];
                                            $routine->$newtch = $data[$i - 1]['teacher_' . $i];
                                            $routine->$newtime = $class_start;
                                            $store_data_r = 1;

                                            echo $day;
                                            echo $data[$i - 1]['subject_' . $i];
                                            echo $data[$i - 1]['teacher_' . $i];
                                            echo $class_start;
                                            echo "<br>";

                                            $res = $routine->save();
                                            //change time
                                            $class_start = strtotime($class_start) - strtotime('TODAY');
                                            $class_start = $class_start + $class_time;
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
            }
            // if ($res) {
            //     return redirect('dashboard')->with('success', 'Routine Successfully Generated');
            // } else {
            //     return redirect('/admin/routine/data')->with('error', 'Something Error');
            // }
        } else {
            return redirect('login');
        }
    }
}