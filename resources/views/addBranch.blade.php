<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add New Branch</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a href="{{url('accommodations')}}">Accommodation</a>
                    <a class="active" href="{{url('branches')}}">Branch</a>
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
                    <a href="{{url('loans')}}">Loan</a>
                    
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
        <h1>Add New Branch</h1>
        <form method="post" action="{{url('branches')}}">
            @csrf
            <p>
                <label for="name">Branch Name:</label>
                <select name="name">
                    <option value="Perak Branch">Perak Branch</option>
                    <option value="Johor Branch">Johor Branch</option>
                    <option value="Kuala Lumpur Branch">Kuala Lumpur Branch</option>
                    <option value="Penang Branch">Penang Branch</option>
                    <option value="Sabah Branch">Sabah Branch</option>
                </select>
            </p>
            <p>
                <label for="email">Branch Email:</label>
                <input type="email" name="email">
            </p>
            <p>
                <label for="contact">Branch Contact:</label>
                <input type="text" name="contact">
            </p>
            <p>
                <label for="branchName">Existing Faculty:</label>
                <select name="branchName[]" multiple="multiple">
                    @foreach($faculties as $faculty)
                    <option value="{{$faculty['id']}}">{{$faculty['facultyCode']}}</option>
                    @endforeach
                </select>
            </p>
            <p>
                <button type="submit">Add Branch</button>
            </p>
        </form>
    </body>
</html>
