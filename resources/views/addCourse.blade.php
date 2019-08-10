<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!-- Author:Lim Shy Pinn -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Course</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
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
        <h1>Add New Course</h1>
        <form method="post" action="{{url('courses')}}">
            @csrf
            <p>
                <label for="name">Course Name:</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="desc">Course Description:</label>
                <input type="text" name="desc">
            </p>
            <p>
                <label for="creditHour">Credit Hour:</label>
                <select name="creditHour">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </p>
            <p>
                <label for="programmeID">Programme Code:</label>
                <select name="programmeID[]" multiple="multiple">
                    @foreach($programmes as $programme)
                    <option value="{{$programme['id']}}">{{$programme['progCode']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <button type="submit">Add Course</button>
            </p>
        </form>
        <?php
        ?>
    </body>
</html>
