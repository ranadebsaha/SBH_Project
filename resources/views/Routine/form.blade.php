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
                            <input type="number" name="classroom" value="{{old('room')}}" class="form-control" id="registerName" placeholder="Enter name">
                            @error('room')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="register">Class Starting Time</label>
                            <input type="text" name="class_start" value="{{old('class_start')}}" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                placeholder="Class Starting Time">
                                @error('class_start')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                            </div>
                            <div class="form-group">
                                <label for="register">Class Closing Time</label>
                                <input type="text" name="class_close" value="{{old('class_close')}}" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                    placeholder="Enter address" >
                                    @error('class_close')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                            </div>
                        <div class="form-group">
                            <label for="registerPhone">Break Time</label>
                            <input type="number" name="break_time" value="{{old('break_time')}}" class="form-control" id="registerPhone"
                                placeholder="Enter phone number">
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
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="monday" id="flexCheckChecked" >
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
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="wednesday" id="flexCheckChecked">
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
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="friday" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Friday
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" name="weekend[]" type="checkbox" value="saturday" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Saturday
                    </label>
                    </div>
                    </div>
                        <div class="form-group">
                            <label for="registerEmail">One Class </label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" id="registerEmail" aria-describedby="emailHelp"
                                placeholder="Enter email">
                                @error('email')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="registerPassword">Password</label>
                            <input type="password" name="password" class="form-control" id="registerPassword" placeholder="Password">
                                @error('password')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        <p class="toggle-form">Already have an account? <a href="{{url('/login')}}">Login</a></p>
                    </form>
                </div>
            <!-- </div>
        </div> -->
    </div>

@endsection    