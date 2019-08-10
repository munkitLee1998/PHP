<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Faculty</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="h2">Home</a>
                    <a href="{{url('accommodations')}}">Accommodation</a>
                    <a href="{{url('branches')}}">Branch</a>
                    <a class="active" href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
                    <a href="{{url('loans')}}">Loan</a>
                    <a href="{{url('maS')}}">Staff</a>
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
            <br />
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div><br />
            @endif
            <h1>Add New Faculty</h1>
            <table class="table table-striped">
                  <a href= "{{url('faculties/create')}}" class="btn btn-primary">Add New Faculty</a>
                <thead>
                    <tr>
                        <th>Faculty Code</th>
                        <th>Faculty Name</th>
                        <th>Faculty Description</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($faculties as $faculty)
                    <tr>
                        <td>{{$faculty['facultyCode']}}</td>
                        <td>{{$faculty['facultyName']}}</td>
                        <td>{{$faculty['facultyDesc']}}</td>
                        
                        <td>
                            <a href="{{action('FacultyController@edit', $faculty['id'])}}" class="btn btn-warning">Update</a>
                        </td>
                        
                        <td>
                            <form action="{{action('FacultyController@destroy', $faculty['id'])}}" method="post">
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
    </body>
</html>
