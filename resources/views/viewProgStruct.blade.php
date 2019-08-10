<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Programme Structure</title>
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
        <div class="container">
            <br/>
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
            @endif
            <h1>View Programmes Structure</h1>
            <table class="table table-striped">
                <a href="{{url('prog_structs/create')}}" class='btn btn-primary'>Add Programmes Structure</a>
                <thead>
                    <tr>
                        <th>Program Belong</th>
                        <th>Programme Structure Code:</th>
                        <th>Professional Certification</th>
                        <th>Certification Description</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($progStructs as $progStruct)
                    <tr>
                        <td>{{$progStruct->programme->progCode}}</td>
                        <td>{{$progStruct['structCode']}}</td>
                        <td>{{$progStruct['ProCert']}}</td>
                        <td>{{$progStruct['certDesc']}}</td>
                        
                        <td>
                            <a href="{{action('ProgStructController@edit',$progStruct['id'])}}" class="btn btn-warning">Update</a>
                        </td>
                        <td>
                            <form action="{{action('ProgStructController@destroy',$progStruct['id'])}}" method="post">
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
