<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View All MER</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/form.css')}}">
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="h2">Home</a>
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
        <div class="container">
            <h1>View the Minimum Entry Requirement</h1>    
            <br/>
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
            @endif
            
            <table class="table table-striped">
                <a href="{{url('mers/create')}}" class="btn btn-primary">Add New Minimum Entry Requirement</a>
                <thead>
                    <tr>
                        <th>Programme offered</th>
                        <th>Examination Qualification</th>
                        <th>Qualification Desciption</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mers as $mer)
                    <tr>
                        <td>{{$mer->programme->progName}}</td>
                        <td>{{$mer['examQualify']}}</td>
                        <td>{{$mer['merDesc']}}</td>
                    
                        <td>
                            <a href="{{action('merController@edit',$mer['id'])}}" class="btn btn-warning">Update</a>
                        </td>
                        <td>
                            <form action="{{action('merController@destroy',$mer['id'])}}" method="post">
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
        ?>
    </body>
</html>
