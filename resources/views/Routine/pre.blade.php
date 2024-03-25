@extends('layouts.main')
@section('main-container')

<div class="container">
        <!-- <div class="row">
            <div class="col-md-20 offset-md-10"> -->
                <div class="form-container" id="registrationForm">
                    <h2 class="text-center">Create Routine</h2>
                    <form method="post" action="">
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
                            <label for="registerName">Class/Depertment Name</label>
                            <input type="text" name="class" value="{{old('class')}}" class="form-control" id="registerName" placeholder="Enter name">
                            @error('classroom')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="register">No of Subject in Class/Depertment</label>
                            <input type="number" name="class_start" value="{{old('class_start')}}" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                                placeholder="Class Starting Time">
                                @error('class_start')
                        <span class="text-danger">
                            *{{ $message }}
                        </span>
                        @enderror
                            </div>
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </form>
                </div>
            <!-- </div>
        </div> -->
    </div>

@endsection    