<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Staff Page</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/form.css')}}"
    </head>
    <body>
        <header>
            <nav>
                <div class="topnav">
                    <a href="../h2">Home</a>
                    <a href="{{url('accommodations')}}">Accommodation</a>
                    <a href="{{url('branches')}}">Branch</a>
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a href="{{url('fees')}}">Fees</a>
                    <a href="{{url('loans')}}">Loan</a>
                    <a class="active" href="{{url('maS')}}">Staff</a>
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
        <h1>View Staff Details</h1>
        <div class="container">
            <br/>
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div><br/>
            @endif
            <table class="table table-striped">
                 <a href="{{url('maS/create')}}" class='btn btn-primary'>Add New Staff</a>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Staff Name</th>
                        <th>Staff Type</th>
                        <th>Staff Email</th>
                        <th>Password</th>
                        
                        
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($user as $user)
                   
                    <tr>
                        <td>{{$user['id']}}</td>
                        <td>{{$user['staffName']}}</td>
                        <td>{{$user['staffType']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['password']}}</td>
                        
                        
                        <td>
                            <a href="{{action('maStaffController@edit',$user['id'])}}"
                               class='btn btn-warning'>Update</a>
                        </td>
                        <td>
                            <form action='{{action('maStaffController@destroy',$user['id'])}}'
                                method='post'>
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