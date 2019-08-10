<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Programmes</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a href="{{url('courses')}}">Courses</a>
                    <a class="active" href="{{url('programmes')}}">Programmes</a>
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
        <h1>Add New Programmes</h1>
        <form method="post" action="{{url('programmes')}}">
            @csrf
            <p>
                <label for="code">Programme Code:</label>
                <input type="text" name="code">
            </p>
            <p>
                <label for="name">Programme Name:</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="description">Programme Description:</label>
                <input type="text" name="description">
            </p>
            <p>
                <label for="duration">Programme Duration(years):</label>
                <select name="duration">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </p>
            <p>
                <label for="level">Level of Study:</label>
                <select name="level">
                    <option value="Diploma">Diploma</option>
                    <option value="Degree">Degree</option>
                    <option value="Master">Master</option>
                    <option value="PhD">PhD</option>
                </select>
            </p>
            <p>
                <label for="facultyCode">Faculty Code:</label>
                <select name="facultyCode">
                    @foreach($faculties as $faculty)
                    <option value="{{$faculty['id']}}">{{$faculty['facultyCode']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="branchName">Branch Offered:</label>
                <select name="branchName[]" multiple="multiple">
                    @foreach($branches as $branch)
                    <option value="{{$branch['id']}}">{{$branch['branchName']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <button type="submit">Add Programme</button>
            </p>
        </form>
        
    </body>
</html>

