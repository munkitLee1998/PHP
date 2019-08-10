<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Display Courses</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
          <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                   <a href="/">Home</a>
                   <a class="active" href="/displayCourse">Search Course</a> 
                   <a href="/search">Search Programme</a>
                   <a href="login">Login</a>
               </div>
            </nav>
        </header>
        <div class="container">
            <form action="/searchCourse" method="post"/>
            @csrf
            <table class="table table-striped">
                <div class="container">

                    <p> The Search results for your courses are :</p>
                    <h2>Courses details</h2>

                    <div class="input-group">
                        <input type="search" name="search" class="form-control"/>
                        <span class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Course Name</th>
                                <th>Course Description</th>
                                <th>Credit Hour</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course as $courses)
                            <tr>
                                <td>{{$courses->id}}</td>
                                <td>{{$courses->courseName}}</td>
                                <td>{{$courses->courseDesc}}</td>
                                <td>{{$courses->creditHour}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </table>
            <a href="{{action('ProgrammeController@searchProgram')}}" class="btn btn-link">View Program</a>
        </div>
    </body>
</html>
