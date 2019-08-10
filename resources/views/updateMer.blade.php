<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit/Update MER</title>
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
                    <a href="{{url('prog_structs')}}">Programme Structure</a>
                    <a class="active" href="{{url('mers')}}">Minimum Entry Requirement</a>
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
        <h2>Edit/Update Minimum Entry Requirement</h2>
        <form method="post" action="{{action('merController@update',$id)}}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
            <p>
                <label for="programID">What program: </label>
                <select name="programID">
                    @foreach($programmes as $programme)
                    <option value="{{$programme['id']}}">{{$programme['progCode']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <label for="examQualify">Examination Qualification: </label>
                <select name="examQualify">
                    <option value="SPM">SPM</option>
                    <option value="STPM">STPM</option>
                    <option value="Diploma">Diploma</option>
                    <option value="Degree">Degree</option>
                    <option value="Master">Master</option>
                </select>
            </p>
            <p>
                <label for="merDesc">Minimum entry requirements description: </label>
                <input type="text" name="merDesc" value="{{$mer->merDesc}}">
            </p>
            <p>
                <button type="submit">Update MER to the program</button>
            </p>
        </form>
        <?php
        ?>
    </body>
</html>
