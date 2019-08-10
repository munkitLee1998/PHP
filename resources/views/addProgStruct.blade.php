<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Program Structure</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a href="{{url('courses')}}">Courses</a>
                    <a href="{{url('programmes')}}">Programmes</a>
                    <a class="active" href="{{url('prog_structs')}}">Programme Structure</a>
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
        <h1>Add New Program Structure</h1>
        <form method="post" action="{{url('prog_structs')}}">
            @csrf
            <p>
                <label for="programID">Add for what program</label>
                <select name="programID">
                    @foreach($programmes as $programme)
                    <option value="{{$programme['id']}}">{{$programme['progCode']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for='structCode'>Programme Structure Code</label>
                <input type="text" name="structCode">
            </p>
            <p>
                <label for="proCert">Professional Certification: </label>
                <input type="text" name="proCert">
            </p>
            <p>
                <label for="certDesc">Description about the Certification: </label>
                <input type="text" name="certDesc">
            </p>
            <p>
                <button type="submit">Add it to programme</button>
            </p>
        </form>
        <?php
        ?>
    </body>
</html>
