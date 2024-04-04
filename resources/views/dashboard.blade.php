@extends('layouts.main')
@section('main-container')
<main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>
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
                    <div>
                      Hello, {{$data->name}}
                    </div>
                    <div
                      class="table-responsive"
                    >
                      <table
                        class="table table-primary"
                      >
                        <thead>
                          <tr>
                            <th scope="col">Subject 1</th>
                            <th scope="col">Subject 2</th>
                            <th scope="col">Subject 3</th>
                            <th scope="col">Subject 4</th>
                            <th scope="col">Subject 5</th>
                            <th scope="col">Subject 6</th>
                            <th scope="col">Subject 7</th>
                            <th scope="col">Subject 8</th>
                          </tr>
                        </thead>
                
                        @foreach($data1 as $d)
                        <tbody>
                          <tr class="">
                            @for($i=0;$i<8;$i++)
                            @php
                            $subject='subject_'.$i+1;
                        $teacher='teacher_'.$i+1;
                        $time='timing_'.$i+1;
                            @endphp
                            <td scope="row">{{$d->$subject}}({{$d->$teacher}})<br>{{$d->$time}}</td>
                            @endfor
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                    </div>
                    
                    
      </main>
@endsection    