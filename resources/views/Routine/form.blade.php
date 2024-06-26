@extends('layouts.main')
@section('main-container')

<div class="container">
        <!-- <div class="row">
            <div class="col-md-20 offset-md-10"> -->
                <div class="form-container" id="registrationForm">
                    <h2 class="text-center">Institute Details</h2>
                    <form method="post" action="{{url('/details')}}">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
                    @csrf
                        <div class="form-group">
                            <label for="registerName">Total Number Of Classroom (Ex:- 10)</label>
                            <input type="text" name="classroom" value="{{old('classroom')}}" class="form-control" id="registerName" placeholder="Enter name">
                            @error('classroom')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="register">Class Starting Time</label>
                            <input type="time" name="class_start" value="{{old('class_start')}}" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                placeholder="Class Starting Time">
                                @error('class_start')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="register">Class Closing Time</label>
                                <input type="time" name="class_close" value="{{old('class_close')}}" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                    placeholder="Enter address" >
                                    @error('class_close')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                            </div>
                        <div class="form-group">
                            <label for="registerPhone">Break Time in minutes</label>
                            <input type="text" name="break_time" value="{{old('break_time')}}" class="form-control" id="registerPhone"
                                placeholder="Enter Break Time">
                                @error('break_time')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                    <div class="form-group">
                                <label for="register">Select Institute Weekend</label>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="sunday" id="flexCheckDefault" checked>
                    <label class="form-check-label" for="flexCheckDefault">
                        Sunday
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="monday" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckChecked">
                        Monday
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="tuesday" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Tuesday
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="wednesday" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckChecked">
                        Wednesday
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="thursday" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Thursday
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="friday" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckChecked">
                        Friday
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="saturday" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckChecked">
                        Saturday
                    </label>
                    </div>
                    </div>
                        <div class="form-group">
                            <label for="registerEmail">Per class time in minute</label>
                            <input type="number" name="class_time" class="form-control" value="{{old('class_time')}}" id="registerEmail" aria-describedby="emailHelp"
                                placeholder="Enter email">
                                @error('class_time')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                        <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">Maximum number of Classes taken by one teacher in a day</label>
                        <input type="number" name="max_class_teacher" value="{{old('max_class_teacher')}}" class="form-control" id="inputPassword4">
                        @error('max_class_teacher')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">Break Time Starts in Between</label>
                        <input type="time" name="break_time_start" value="{{old('break_time_start')}}" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">to</label>
                        <input type="time" name="break_time_end" value="{{old('break_time_end')}}" class="form-control" id="inputPassword4">
                    </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            <!-- </div>
        </div> -->
    </div>

@endsection    