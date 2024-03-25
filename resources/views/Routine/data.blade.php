@extends('layouts.main')
@section('main-container')

<div class="container">
        <!-- <div class="row">
            <div class="col-md-20 offset-md-10"> -->
                <div class="form-container" id="registrationForm">
                    <h2 class="text-center">Create Routine</h2>
                    <form method="post" class="row g-3" action="{{url('/admin/data')}}">
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
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <i>Enter Subject name and its Corresponding teacher name</i>
                    @csrf
                    @for($i=0;$i<Session::get('class_no');$i++)

                    <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Subject-{{$i+1}} Name</label>
                    <input type="text" name="subject{{$i+1}}" class="form-control" id="inputEmail4">
                    @error('subject{{$i+1}}')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Teacher-{{$i+1}} Name</label>
                        <input type="text" name="teacher{{$i+1}}" class="form-control" id="inputPassword4">
                        @error('teacher{{$i+1}}')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                    </div>

                        @endfor
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            <!-- </div>
        </div> -->
    </div>

@endsection    