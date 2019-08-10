<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Course</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="h2">Home</a>
                    <a class="active" href="{{url('courses')}}">Courses</a>
                    <a href="{{url('programmes')}}">Programmes</a>
                    <a href="{{url('prog_structs')}}">Programme Structure</a>
                    <a href="{{url('mers')}}">Minimum Entry Requirement</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </nav>
        </header>
        <div class="container">
            <br/>
            @if (\Session::get('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
            @endif
            <h1>View Courses</h1>
            <table class="table table-striped">
                <a href= "{{url('courses/create')}}" class="btn btn-primary">Add New Course</a>
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Course Description</th>
                        <th>Credit Hour</th>
                        <th>Programme Code</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                    <tr>
                        <td>{{$course['courseName']}}</td>
                        <td>{{$course['courseDesc']}}</td>
                        <td>{{$course['creditHour']}}</td>
                        <td>
                            @foreach($course->programme as $programmes)
                            {{$programmes->progCode}}<br/>
                            @endforeach
                        </td>
                        
                        
                        <td>
                            <a href="{{action('CourseController@edit', $course['id'])}}" class="btn btn-warning">Update</a>
                        </td>
                        
                        <td>
                            <form action="{{action('CourseController@destroy', $course['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <?php
        interface Time {
            public function show();
        }
        
        class TimeMaker{
            private $timeZone, $date;
            function __construct() {
                $this->timeZone = new TimeZone();
                $this->date = new Date();
            }
            public function showTimeZone() {
                $this->timeZone->show();
            }
            public function showDate() {
                $this->date->show();
            }   
        }
        
        class TimeZone implements Time {
            public function show() {
                date_default_timezone_set("Asia/Kuala_Lumpur");
                echo "The current time at Kuala Lumpur is " . date("h:i:sa") . "<br/>";
            }
        }
        
        class Date implements Time {
            public function show() {
                echo "The current date " . date("d-m-Y") . "<br/>";
            }
        }
        $TimeMaker = new TimeMaker();
        
        $TimeMaker->showTimeZone();
        $TimeMaker->showDate();
        ?>
    </body>
</html>
