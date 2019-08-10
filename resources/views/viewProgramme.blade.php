<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Programmes</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="h2">Home</a>
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
        <div class="container">
            <br />
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            
            <table class="table table-striped">
                     <a href= "{{url('programmes/create')}}" class="btn btn-primary">Add New Programmes</a>
                <thead>
                    <tr>
                        <th>Programme Code</th>
                        <th>Programme Name</th>
                        <th>Description</th>
                        <th>Learning Year</th>
                        <th>Level of Study</th>
                        <th>Faculty Code</th>
                        <th>Branch Offered</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programmes as $programme)
                    <tr>
                        <td>{{$programme['progCode']}}</td>
                        <td>{{$programme['progName']}}</td>
                        <td>{{$programme['desc']}}</td>
                        <td>{{$programme['duration']}}</td>
                        <td>{{$programme['levelOfStudy']}}</td>
                        <td>{{$programme->faculty->facultyCode}}</td>
                        <td>
                            @foreach($programme->branch as $branches)
                            {{$branches->branchName}}<br/>
                            @endforeach
                        </td>
                     
                        
                        <td>
                            <a href="{{action('ProgrammeController@edit', $programme['id'])}}" class="btn btn-warning">Update</a>
                        </td>
                        
                        <td>
                            <form action="{{action('ProgrammeController@destroy', $programme['id'])}}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           <!-- <a href="{{action('ProgrammeController@searchProgram')}}">Display program in sortlist</a> -->
        </div>
    </body>
</html>
