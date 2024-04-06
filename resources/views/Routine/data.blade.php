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
                        <span class="text-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
</span>
                        </ul>
                    @endif
                    <i>Enter Subject name and its Corresponding teacher name</i>
                    @csrf
                    @for($i=0;$i<Session::get('subject_no');$i++)

                    <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Subject-{{$i+1}} Name</label>
                    <input type="text" name="subject_{{$i+1}}" value="{{old('subject_'.$i+1)}}" class="form-control" id="inputEmail4">
                    @error('subject_.{{$i+1}}')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Teacher-{{$i+1}} Name</label>
                        <input type="text" name="teacher_{{$i+1}}" value="{{old('teacher_'.$i+1)}}" class="form-control" id="inputPassword4">
                        @error('teacher_.{{$i+1}}')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                    </div>
                        @endfor
                        
                        <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">Maximum number of Classes will be held in a day</label>
                        <input type="number" name="max_class_day" value="{{old('max_class_day')}}" class="form-control" id="inputPassword4">
                    </div>
                        <div class="col-md-8">
                        <label for="inputPassword4" class="form-label">Maximum number of classes in One Subject per Week</label>
                        <input type="number" name="max_class_week" value="{{old('max_class_week')}}" class="form-control" id="inputPassword4">
                    </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            <!-- </div>
        </div> -->
    </div>

@endsection    