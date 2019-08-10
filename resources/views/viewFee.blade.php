<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Fee</title>
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
                    <a href="{{url('faculties')}}">Faculties</a> 
                    <a class="active" href="{{url('fees')}}">Fees</a>
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
            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
            @endif
            <h1>View Fees</h1>
            <table class="table table-striped">
                <a href= "{{url('fees/create')}}" class="btn btn-primary">Add New Fees</a>
                <thead>
                    <tr>
                        <th>Fee ID</th>
                        <th>Fee Name</th>
                        <th>Fee Description</th>
                        <th>Fee Type(semester)</th>
                        <th>Amount(per semester)(RM)</th>
                        <th>Programme Code</th>
                        <th colspan="4">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($fees as $fee)
                    <tr>
                        <td>{{$fee['feeID']}}</td>
                        <td>{{$fee['feeName']}}</td>
                        <td>{{$fee['desc']}}</td>
                        <td>{{$fee['feeType']}}</td>
                        <td>{{$fee['amount']}}</td>
                        <td>{{$fee->programme->progCode}}</td>
                        
                        <td>
                            <a href="{{action('FeeController@edit', $fee['id'])}}" class="btn btn-warning">Update</a>
                        </td>
                        
                        <td>
                            <form action="{{action('FeeController@destroy', $fee['id'])}}" method="post">
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
